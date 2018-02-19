<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDePago
 * @package App
 */
class TipoDePago extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable=[
        'nombre',
        'descripcion',
    ];
    /**
     * @var string
     */
    protected $table='tipos_de_pagos';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function pagos(){
        return $this->hasMany('App\PagoDirecto','tipo_de_pago_id');
    }

}
