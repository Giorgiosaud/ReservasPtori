<?php

namespace App;

use App\Traits\procesarPago;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use procesarPago;
    protected $fillable = ['monto', 'pago_id', 'pago_type', 'reservacion_id', 'created_at', 'updated_at'];

    public function detalles()
    {
        return $this->morphTo('pago');
    }

    public function reserva()
    {
        return $this->belongsTo(Reservacion::class, 'reservacion_id');
    }
    public function getMontoPagadoAttribute()
    {
        $monto = $this->attributes['monto'];
        return number_format($monto, 2, ',', '.') . " Bs.";
    }
}
