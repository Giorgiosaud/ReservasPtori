<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDePaseo
 * @package App
 */
class TipoDePaseo extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    /**
     * @var string
     */
    protected $table='tipos_de_paseos';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function precios(){
        return $this->hasMany('App\Precio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paseos(){
        return $this->hasMany('App\Paseo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paseoConPrecio(){
        return $this->hasMany('App\Precio');
    }
}
