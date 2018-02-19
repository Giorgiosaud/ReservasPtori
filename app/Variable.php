<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Variable
 * @package App
 */
class Variable extends Model
{
    /**
     * @var array
     */
    protected $fillable=[
        'nombre',
        'valor'
    ];
    //

    /**
     * @param $query
     * @return mixed
     */
    public function scopeDiasDeLaSemana($query){
        return $query->whereNombre('Lunes')
            ->orWhere('nombre','Martes')
            ->orWhere('nombre','Miercoles')
            ->orWhere('nombre','Jueves')
            ->orWhere('nombre','Viernes')
            ->orWhere('nombre','Sabado')
            ->orWhere('nombre','Domingo');
    }
}
