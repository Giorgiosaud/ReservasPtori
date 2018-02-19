<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paseo
 * @package App
 */
class Paseo extends Model
{


    /**
     * @var array
     */
    protected $fillable = [
        'horaDeSalida',
        'nombre',
        'orden',
        'publico',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo',
        'descripcion',
        'tipo_de_paseo_id',
    ];

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
    public function embarcaciones()
    {
        return $this->belongsToMany('App\Embarcacion', 'embarcacion_paseo')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDePaseo()
    {
        return $this->belongsTo('App\TipoDePaseo');
    }

    /**
     * devuelve lista de id de las embarcaciones de el paseo seleccionado
     * @return array
     */
    public function getListaDeEmbarcacionesAttribute()
    {
        return $this->embarcaciones->lists('id');
    }

    /**
     * @return string
     */
    public function getHoraSalidaToEventAttribute(){
        $hora=intval(substr($this->horaDeSalida,0,2));
        if($hora<8){
            $ret='T'.($hora+12).':00';
            return $ret;
        }
        $ret='T'.($hora).':00';
        return $ret;
    }


}
