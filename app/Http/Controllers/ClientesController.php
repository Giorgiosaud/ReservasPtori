<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function obtenerDatos($identificacion)
    {
        //dd($identificacion);
        $cliente = Cliente::whereIdentificacion($identificacion)->get([
            'nombre',
            'apellido',
            'email',
            'telefono',
            'visitas',
            'esAgencia',
            'credito'
        ])->first();
        //return $cliente;
        if (is_null($cliente))
        {
            $cliente['nombre'] = '';
            $cliente['apellido'] = '';
            $cliente['email'] = '';
            $cliente['telefono'] = '';
            $cliente['visitas'] = '';
            $cliente['esAgencia'] = '';
            $cliente['credito'] = '';
        }


        return $cliente;

    }
}
