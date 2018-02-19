<?php

namespace App;

use App\Facades\Vari;
use App\Traits\ProcesarReservacion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservacion
 * @package App
 */
class Reservacion extends Model
{


    use ProcesarReservacion;

    /**
     * @var string
     */
    protected $table = 'reservaciones';
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'fecha',
        'cliente_id',
        'embarcacion_id',
        'paseo_id',
        'adultos',
        'mayores',
        'ninos',
        'modificadoPor',
        'hechoPor',

    ];
    /**
     * @var array
     */
    protected $with = ['cliente', 'embarcacion', 'paseo', 'estadoDePago','pagos'];
    /**
     * @var array
     */
    protected $relations = [
        'cliente',
        'paseo',
        'embarcacion',
    ];
    /**
     * @var array
     */
    protected $dates = [
        'fecha',
        'deleted_at'
    ];

    public function getFechaAttribute($fecha){
        return Carbon::parse($fecha)->format('d-m-Y');

    }
    public function setFechaAttribute($fecha)
    {
//        dd($fecha);
        $this->attributes['fecha'] = Carbon::createFromFormat('d-m-Y', $fecha)->toDateString();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function embarcacion()
    {
        return $this->belongsTo('App\Embarcacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paseo()
    {
        return $this->belongsTo('App\Paseo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoDePago()
    {
        return $this->belongsTo('App\EstadoDelPago', 'estado_del_pago_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pasajeros()
    {
        return $this->hasMany('App\Pasajero');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany('App\Pago');
    }

    /**
     * @param $query
     * @param $fecha
     * @return mixed
     */
    public function scopeReservasDeLaFecha($query, $fecha)
    {
        return $query->whereFecha($fecha);
    }

    /**
     * @param $query
     * @param $fecha
     * @return mixed
     */
    public function scopePasajerosReservadosDeLaFecha($query, $fecha)
    {
        $cantidad = $query->whereFecha($fecha)->sum('adultos') + $query->whereFecha($fecha)->sum('mayores') +
            $query->whereFecha($fecha)->sum('ninos');

        return $cantidad;
    }

    /**
     * @param $fecha
     * @param $embarcacion
     * @param $paseo
     * @return mixed
     */
    public static function ObtenerPasajerosReservadosDeLaFechaEmbarcacionyPaseo($fecha, $embarcacion, $paseo){
        dd($embarcacion);
        $reservaciones=Reservacion::where('fecha',$fecha)->where('embarcacion_id',$embarcacion->id)->where('paseo_id',$paseo->id)->get();
        return $reservaciones;
    }
    /**
     * @param $query
     * @param $fecha
     * @param $embarcacion_id
     * @param $paseo_id
     * @return mixed
     */
    public function scopePasajerosReservadosDeLaFechaEmbarcacionyPaseo($query, $fecha, $embarcacion_id, $paseo_id)
    {
        $q=$query->whereFecha($fecha)
            ->whereEmbarcacionId($embarcacion_id)
            ->wherePaseoId($paseo_id)->get();
        $count=$q->reduce(function($carry,$item){
            return $carry + $item->adultos+$item->mayores+$item->ninos;
        },0);
        return $count;
    }

    /**
     * @return Reservacion $this
     */


    /**
     * @param $query
     * @param $fecha
     * @param $clienteId
     * @param $embarcacionId
     * @param $paseoId
     * @return mixed
     */
    public function scopeObtenerVecesQueSeRepite($query, $fecha, $clienteId, $embarcacionId, $paseoId)
    {
        $search = [
            'fecha'          => $fecha,
            'cliente_id'     => $clienteId,
            'embarcacion_id' => $embarcacionId,
            'paseo_id'       => $paseoId,
        ];

        return $query->where($search);
    }

    /**
     * @param $value
     * @return float|int
     */
    public function getMontoTotalAttribute($value){
        return $value/100;
    }
    /**
     * @return int|string
     */
    public function getDeudaAttribute()
    {
        $totalAPagar = $this->attributes['montoTotal']/100;
        $totalPagado = $this->pagos->sum('monto');

        return $totalAPagar - $totalPagado;
    }

    /**
     * @return int|string
     */
    public function getmontoTotalAPagarAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal']/100;
        if ($tmpmonto > 0) {
            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else {
            return 0;
        }
    }

    /**
     * @return string
     */
    public function getmontoPagadoAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal']/100 - $this->deuda;

        if ($tmpmonto > 0) {
            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else {
            return "0 Bs.";
        }
    }

    /**
     * @return string
     */
    public function getmontoDeudaRestanteAttribute()
    {
        $tmpmonto = $this->deuda;


        return number_format($tmpmonto, 2, ',', '.') . " Bs.";
    }

    /**
     * @return mixed
     */
    public function getTotalPasajerosEnReservaAttribute()
    {
        return $this->attributes['adultos'] + $this->attributes['mayores'] + $this->attributes['ninos'];
    }

    /**
     * @return int|string
     */
    public function getmontoSinIvaAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal']/100;
        if ($tmpmonto > 0) {
            $tmpmonto = $tmpmonto / (1 + (Vari::get('iva') / 100));

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else {
            return 0;
        }
    }

    /**
     * @return int|string
     */
    public function getmontoIVAAttribute()
    {
        $tmpmonto = $this->attributes['montoTotal']/100;
        if ($tmpmonto > 0) {
            $tmpmonto = $tmpmonto - ($tmpmonto / (1 + (Vari::get('iva') / 100)));

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else {
            return 0;
        }
    }


    /**
     * @return int|string
     */
    public function getmontoServicioAttribute()
    {
        $tmpmonto = $this->deuda;
        if ($tmpmonto > 0) {
            $tmpmonto = $tmpmonto * (Vari::get('servicio') / 100);

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else {
            return "0 Bs.";
        }
    }

    /**
     * @return int|string
     */
    public function getmontoConServicioAttribute()
    {
        $tmpmonto = $this->deuda;
        if ($tmpmonto > 0) {
            $tmpmonto = $tmpmonto * (1 + (Vari::get('servicio') / 100));

            return number_format($tmpmonto, 2, ',', '.') . " Bs.";
        } else {
            return "0 Bs.";
        }
    }

    /**
     * @return array
     */
    public function getPreferenceDataAttribute()
    {

        $preference_data = [

            "items"              => [
                [
                    "title"       => "Paseo en " . $this->embarcacion->nombre,
                    "quantity"    => 1,
                    "currency_id" => "VEF",
                    "unit_price"  => $this->attributes['montoTotal']/100 * 1.1,
                    "description" => "Paquete completo reservado en " . $this->embarcacion->nombre,
                ],
            ],
            "payer"              => [
                [
                    "name"    => $this->cliente->nombre,
                    "surname" => $this->cliente->apellido,
                    "email"   => $this->cliente->email
                ]
            ],
            "back_urls"          => [
                "success" => "http://reservas.puertorinoco.com/success",
                "failure" => "http://reservas.puertorinoco.com/failure",
                "pending" => "http://reservas.puertorinoco.com/pending"
            ],
            "payment_methods"    => [
            ],
            "external_reference" => $this->id
        ];

        return $preference_data;
    }

    /**
     * @param bool $excludeDeleted
     * @return Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function newQuery($excludeDeleted = true)
    {
        $builder = new Builder($this->newBaseQueryBuilder());
        $builder->setModel($this)->with($this->with);

        return $builder;
    }
}
