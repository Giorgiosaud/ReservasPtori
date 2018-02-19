<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FechaEspecial
 * @package App
 */
class FechaEspecial extends Model
{
    /**
     * @var string
     */
    protected $table='fechas_especiales';
    /**
     * @var array
     */
    protected $dates=['fecha'];
    /**
     * @var array
     */
    protected $fillable=array(
        'fecha',
        'clase',
        'descripcion',
    );

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFuturo($query)
    {
        return $query->where('fecha','>=',Carbon::now());
    }

    /**
     * @return $this
     */
    public function embarcaciones(){
        return $this->belongsToMany('App\Embarcacion','embarcacion_fecha_especial')->withTimestamps()->withPivot('activa');
    }

    /**
     * @return $this
     */
    public function paseos(){
        return $this->belongsToMany('App\Paseo','paseos_fecha_especial')->withTimestamps()->withPivot('activa');
    }

    /**
     * @return mixed
     */
    public function getListaDeEmbarcacionesAttribute()
    {
        return $this->embarcaciones->pluck('id')->toArray();
    }

    /**
     * @return mixed
     */
    public function getListaDePaseosAttribute()
    {
        return $this->paseos->pluck('id')->toArray();
    }

    /**
     * @return mixed
     */
    public function getFechaAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
}
