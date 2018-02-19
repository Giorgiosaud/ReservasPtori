<?php
/**
 * Created by PhpStorm.
 * User: jorgelsaud
 * Date: 01-02-18
 * Time: 12:20
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Vari extends Facade
{
    protected static function  getFacadeAccessor() { return 'vari'; }
}