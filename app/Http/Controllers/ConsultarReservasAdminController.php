<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Embarcacion;
use App\Http\Middleware\autorizadoConsultarReservas;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ConsultarReservacionRequest;
use App\Http\Requests\ModificarPaseoRequest;
use App\Http\Requests\PagosRequest;
use App\Pago;
use App\PagoDirecto;
use App\Pasajero;
use App\Paseo;
use App\Reservacion;
use App\TipoDePago;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ConsultarReservasAdminController extends Controller
{

    /**
     * @var Guard
     */
    private $auth;

    function __construct(Guard $auth)
    {
        $this->middleware(autorizadoConsultarReservas::class);
        $this->auth = $auth;
    }


    /**
     * Muestra Formulario para consulta de Reservas
     *
     * @return Response
     */
    public function mostrarFormulario()
    {
        $paseos = Paseo::pluck('horaDeSalida', 'id')->all();

        $embarcaciones = Embarcacion::pluck('nombre', 'id')->all();

        return view('reservacion.admin.consulta', compact('paseos', 'embarcaciones'));
    }

    public function mostrarFormularioAbordaje()
    {
        $paseos = Paseo::pluck('horaDeSalida', 'id')->all();

        $embarcaciones = Embarcacion::pluck('nombre', 'id')->all();

        return view('reservacion.admin.abordaje', compact('paseos', 'embarcaciones'));
    }

    public function delete($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->delete();
    }


    public function consultarReservas(ConsultarReservacionRequest $request)
    {

        $reservaciones=$this->ObtenerReservaciones($request);
        return view('reservacion.admin.show', compact('reservaciones'));
    }
    protected function ObtenerReservaciones($request){
        if ($this->laConsultatieneNumeroDeReservacion($request)) {
            return Reservacion::where('id', $request->input('numero_de_reserva'))->get();
        }
        if ($this->laConsultaTieneNombreOApellido($request)) {
            $clientes = $this->obtenerClientesPorNombreOApellido($request);
            return $this->consultarReservacionesDeClientes($clientes);
        }
        $horas = $request->input('horas');
        $embarcaciones = $request->input('embarcaciones');

        if ($request->input('horas') == []) {
            $horas = Paseo::pluck('id')->all();
        }
        if ($request->input('embarcacion_id') == []) {
            $embarcaciones = Embarcacion::pluck('id')->all();
        }
        return $this->consultarReservaciones($request, $embarcaciones, $horas);
    }

    public function editarReserva($id)
    {
        $reserva = Reservacion::with(['cliente', 'embarcacion', 'paseo', 'estadoDePago'])->find($id);
        $embarcaciones = Embarcacion::pluck('nombre', 'id')->all();
        $paseos = Paseo::pluck('horaDeSalida', 'id')->all();
        $tiposDePagos = TipoDePago::where('nombre', '!=', 'Mercadopago')->pluck('nombre', 'id')->all();
        $pasajerosEnReserva = Reservacion::PasajerosReservadosDeLaFechaEmbarcacionyPaseo($reserva->fecha, $reserva->embarcacion_id, $reserva->paseo_id);
        if (is_object($pasajerosEnReserva)) {
            $pasajerosEnReserva = $pasajerosEnReserva->adultos + $pasajerosEnReserva->mayore + $pasajerosEnReserva->ninos;
        }
        $maximoCupos = $reserva->embarcacion->abordajeNormal;
        if ($this->auth->user()->nivelDeAcceso->permiso->cuposExtra) {
            $maximoCupos = $reserva->embarcacion->abordajeMaximo;
        }
//        dd($pasajerosEnReserva);
        $cuposDisponibles = $maximoCupos - $pasajerosEnReserva + $reserva->adultos + $reserva->mayores + $reserva->ninos;

        return view('reservacion.admin.edit',
            compact('reserva', 'embarcaciones', 'paseos', 'cuposDisponibles', 'tiposDePagos'));

    }

    /**
     * @param ConsultarReservacionRequest $request
     * @param $embarcaciones
     * @param $horas
     * @return mixed
     *
     */
    public function consultarReservaciones(ConsultarReservacionRequest $request, $embarcaciones, $horas)
    {
        $fecha=Carbon::createFromFormat('d-m-Y', $request->input('fecha'))->format('Y-m-d');
        return Reservacion::whereIn('embarcacion_id', $embarcaciones)
            ->whereIn('paseo_id', $horas)
            ->where('fecha', $fecha)
            ->orderBy('embarcacion_id')->orderBy('paseo_id')
            ->orderBy('estado_del_pago_id', 'Desc')
            ->get();
    }
    protected function consultarReservacionesDeClientes($clientes){
        return Reservacion::whereIn('cliente_id', $clientes)
            ->orderBy('fecha','Desc')
            ->orderBy('embarcacion_id')->orderBy('paseo_id')
            ->orderBy('estado_del_pago_id', 'Desc')
            ->get();
    }

    public function recibirPago(PagosRequest $request)
    {

        $fecha=Carbon::createFromFormat('d-m-Y', $request->input('fecha'))->toDateString();

        $request->merge(['fecha' => $fecha]);

        $pd=PagoDirecto::create($request->all());
//        dd($pd);
        Reservacion::find($request->input('reservacion_id'))->touch();

        return redirect()->route('editarReservas', $request->input('reservacion_id'));

        //return view('reservacion.admin.partials.recibido.pago', compact('pago'));
    }

    public function borrarPago(Request $r)
    {
        $pago = Pago::find($r->input('id'));
        $id = $pago->reserva->id;
        $pago->delete();
        $reserva = Reservacion::find($id)->touch();

        return redirect()->route('editarReservas', $id);
    }

    public function modificarCliente(ClienteRequest $request)
    {
        $cliente = Cliente::find($request->input('id'));
        $cliente->fill($request->all());
        $cliente->save();

        return redirect()->route('editarReservas', $request->input('reservacion_id'));

    }

    public function modificarPaseo(ModificarPaseoRequest $request)
    {
        $paseo = Reservacion::find($request->input('id'));
        $paseo->fill($request->all());
        $paseo->save();

        return redirect()->route('editarReservas', $request->input('id'));
    }

    public function anadirPasajeros(Request $request)
    {
        $pasajero = Pasajero::create($request->all());

        return redirect()->route('editarReservas', $request->input('reservacion_id'));
    }

    public function borrarPasajero(Request $request)
    {
        $pasajero = Pasajero::find($request->input('id'));
        $pasajero->delete();

        return redirect()->route('editarReservas', $request->input('reservacion_id'));

    }

    public function borrarReserva($id)
    {
        $reservacion = Reservacion::destroy($id);
        $reservacion = Reservacion::find($id);
        Flash::error('Reserva Numero! ' . $id . ' Borrada');
        return redirect()->route('formularioDeConsultaDeReserva');
    }

    /**
     * @param ConsultarReservacionRequest $request
     * @return bool
     */
    public function laConsultatieneNumeroDeReservacion(ConsultarReservacionRequest $request)
    {
        return $request->input('numero_de_reserva') != '';
    }

    /**
     * @param ConsultarReservacionRequest $request
     * @return bool
     */
    public function laConsultaTieneNombreOApellido(ConsultarReservacionRequest $request)
    {
        return $request->input('nombreoapellido') != '';
    }

    /**
     * @param ConsultarReservacionRequest $request
     * @return mixed
     */
    public function obtenerClientesPorNombreOApellido(ConsultarReservacionRequest $request)
    {
        $clientes = Cliente::where('nombre', 'LIKE', '%'.$request->input('nombreoapellido').'%')
            ->orWhere('apellido', 'LIKE', '%'.$request->input('nombreoapellido').'%')->get();
        return $clientes->pluck('id');
    }
}
