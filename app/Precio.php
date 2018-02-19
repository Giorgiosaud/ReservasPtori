<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Precio
 * @package App
 */
class Precio extends Model
{


    //
    /**
     * @var array
     */
    protected $dates=[
        'aplicar_desde',
    ];
    /**
     * @var array
     */
    protected $fillable=[
        'adulto',
        'mayor',
        'nino',
        'aplicar_desde',
        'tipo_de_paseo_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDePaseo()
    {
        return $this->belongsTo('App\TipoDePaseo');
    }

    /**
     * @param $value
     * @return string
     */
    public function getAdultoAsCurrencyAttribute($value)
    {
        if (isset($this->attributes['adulto'])) {
            return number_format($this->attributes['adulto']/100, 2, ',', '.').' Bs.';
        }
        return '0.00 Bs';
    }

    /**
     * @param $value
     * @return float|int
     */
    public function getAdultoAttribute($value)
    {
        return $value/100;

    }

    /**
     * @param $value
     */
    public function setAdultoAttribute($value)
    {
        $this->attributes['adulto'] = $value*100;
    }


    /**
     * @param $value
     * @return string
     */
    public function getMayorAsCurrencyAttribute($value)
    {
        if (isset($this->attributes['mayor'])) {
            return number_format($this->attributes['mayor']/100, 2, ',', '.').' Bs.';
        }
        return '0.00 Bs';
    }

    /**
     * @param $value
     * @return float|int
     */
    public function getMayorAttribute($value)
    {
        return $value/100;

    }

    /**
     * @param $value
     */
    public function setMayorAttribute($value)
    {
        $this->attributes['mayor'] = $value*100;
    }

    /**
     * @param $value
     * @return string
     */
    public function getNinoAsCurrencyAttribute()
    {
        if (isset($this->attributes['nino'])) {
            return number_format($this->attributes['nino']/100, 2, ',', '.').' Bs.';
        }
        return '0.00 Bs';
    }

    /**
     * @param $value
     * @return float|int
     */
    public function getNinoAttribute($value)
    {
        return $value/100;

    }
    /**
     * @param $value
     */
    public function setNinoAttribute($value)
    {
        $this->attributes['nino'] = $value*100;
    }

    /**
     * @param $value
     * @return string
     */
    public function getAplicarDesdeAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param $value
     */
    public function setAplicarDesdeAttribute($value)
    {
        $this->attributes['aplicar_desde'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
    /**
     * @param $query
     * @param $fecha
     * @return mixed
     */
    public function scopePrecioParaLaFecha($query, $fecha)
    {
        if(!($fecha instanceof Carbon)) {
            $fecha = Carbon::createFromFormat('d-m-Y', $fecha)->toDateString();
        }
        return $query->where('aplicar_desde', '<=', $fecha)->latest()->take(1)->get(array('adulto','mayor',
            'nino'));
    }
}
