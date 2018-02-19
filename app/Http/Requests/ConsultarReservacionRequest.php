<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultarReservacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->nivelDeAcceso->permiso->consultarReservas;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'numero_de_reserva' => 'required_without_all:fecha,exists:reservaciones,id',
//            'fecha'             => 'required_without_all:numero_de_reserva,nombreoapellido',
//            'horas'             => 'array',
//            'embarcaciones'     => 'array',
        ];
    }
}
