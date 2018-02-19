<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NivelDeAcceso
 * @package App
 */
class NivelDeAcceso extends Model
{
    /**
     * @var string
     */
    protected $table='niveles_de_acceso';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuario(){
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permiso(){
        return $this->belongsTo('App\Permiso','permiso_id');
    }
}
