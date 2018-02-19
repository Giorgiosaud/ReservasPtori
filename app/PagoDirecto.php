<?php

namespace App;

use App\Traits\RegistrarPago;
use Illuminate\Database\Eloquent\Model;

class PagoDirecto extends Model
{

    use RegistrarPago;
    protected $table = 'pagos_directos';

    protected $fillable= [
        'fecha',
        'descripcion',
        'monto',
        'tipo_de_pago_id',
        'reservacion_id',
    ];

    public function pagos()
    {
        return $this->morphMany('App\Pago', 'pago');
    }

    public function tipo()
    {
        return $this->belongsTo('App\TipoDePago', 'tipo_de_pago_id');
    }

    public function getNumeroDeReservacionAttribute()
    {
        return $this->attributes['reservacion_id'];

    }

    public function getmontoPagadoAttribute()
    {
        return $this->attributes['monto'];

    }
}
