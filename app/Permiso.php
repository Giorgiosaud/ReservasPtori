<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * @package App
 */
class Permiso extends Model
{


    /**
     * @var array
     */
    protected $casts = [
        'esAgencia'                          => 'boolean',
        'cuposExtra'                         => 'boolean',
        'DisponibilidadTotalDeEmbarcaciones' => 'boolean',
        'DisponibilidadTotalDePaseos'        => 'boolean',
        'accesoEdicionDePagina'              => 'boolean',
        'editarEmbarcaciones'                => 'boolean',
        'editarPaseos'                       => 'boolean',
        'consultarReservas'                  => 'boolean',

    ];
    /**
     * @var array
     */
    protected $fillable = [
        'esAgencia',
        'cuposExtra',
        'accesoEdicionDePagina',
        'DisponibilidadTotalDeEmbarcaciones',
        'DisponibilidadTotalDePaseos',
        'editarEmbarcaciones',
        'editarPaseos',
        'consultarReservas',];

    //

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nivelDeAcceso()
    {
        return $this->hasMany('App\NivelDeAcceso');
    }

}
