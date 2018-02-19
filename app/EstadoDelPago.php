<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoDelPago
 * @package App
 */
class EstadoDelPago extends Model
{
    /**
     * @var string
     */
    protected $table='estados_de_los_pagos';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas(){
        return $this->hasMany('App\Reservacion');
    }
}
