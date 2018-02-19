<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pasajero
 * @package App
 */
class Pasajero extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'identificacion',
        'email',
        'telefono',
        'reservacion_id',
    ];

    //

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reserva()
    {
        return $this->belongsTo('App\Reservacion', 'reservacion_id');
    }
}
