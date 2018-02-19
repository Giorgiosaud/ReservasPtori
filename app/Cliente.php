<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * @package App
 */
class Cliente extends Model
{
    /**
     * @var array
     */
    protected $fillable=[
        'nombre',
        'apellido',
        'identificacion',
        'email',
        'telefono',
        'credito',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas()
    {
        return $this->hasMany(Reservacion::class);
    }

    /**
     * @return string
     */
    public function getMontoCreditoAttribute(){
        $monto = $this->attributes['credito'];
        return number_format($monto, 2, ',', '.') . " Bs.";

    }
    //
}
