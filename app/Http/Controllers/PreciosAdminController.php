<?php

namespace App\Http\Controllers;

use App\Precio;
use App\TipoDePaseo;
use Illuminate\Http\Request;

class PreciosAdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $precios = Precio::all();
        $preciosTableStyle = [];
        foreach ($precios as $precio)
        {
            $array = [
                'Id'        => $precio->id,
                'Tipo de Paseo'=>$precio->tipoDePaseo->nombre,
                'Adulto'    => $precio->adultoAsCurrency,
                'Mayor'    => $precio->mayorAsCurrency,
                'Niño'    => $precio->ninoAsCurrency,
                'Aplicar Desde'    => $precio->aplicar_desde,

            ];
            array_push($preciosTableStyle, $array);
        }

        return view('precios.admin.all', compact('preciosTableStyle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tiposDePaseos = TipoDePaseo::pluck('nombre', 'id')->all();
        return view('precios.admin.create',compact('tiposDePaseos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PrecioRequest $request)
    {
        dd($request);
        Precio::create($request->all());
        return redirect()->route('precios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $precio = Precio::findOrFail($id);
        $tiposDePaseos = TipoDePaseo::pluck('nombre', 'id');

        //dd($embarcacion);
        return view('precios.admin.edit', compact('precio','tiposDePaseos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $precio = Precio::find($id);

        $precio->fill($request->all());

        $precio->save();

        return redirect()->route('precios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $precio=Precio::find($id);
        $precio->delete();
        return redirect()->route('precios.index');
    }


}
