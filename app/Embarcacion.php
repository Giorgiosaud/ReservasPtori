<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Embarcacion
 * @package App
 */
class Embarcacion extends Model
{
    /**
     * @var array
     */
    protected $casts = [
        'publico' => 'boolean'
    ];
    /**
     * @var array
     */
    protected $fillable = [
        'nombre',
        'orden',
        'publico',
        'abordajeMinimo',
        'abordajeMaximo',
        'abordajeNormal',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo',
    ];
    /**
     * @var string
     */
    protected $table = 'embarcaciones';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas()
    {
        return $this->hasMany('App\Reservacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paseos()
    {
        return $this->belongsToMany('App\Paseo', 'embarcacion_paseo')->withTimestamps();
    }


    /**
     * @return $this
     */
    public function fechasEspeciales()
    {
        return $this->belongsToMany('App\FechaEspecial', 'embarcacion_fecha_especial')
            ->withTimestamps()->withPivot('activa');
    }
}
