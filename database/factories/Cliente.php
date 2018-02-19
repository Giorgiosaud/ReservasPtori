<?php

use Faker\Generator as Faker;

$factory->define(\App\Cliente::class, function (Faker $faker) {
    return [
    'nombre'=>$faker->name,
    'apellido'=>$faker->lastName,
    'identificacion'=>$faker->randomElement(['V','E','J','G','P']).'-'.$faker->randomNumber(8,false),
    'email'=>$faker->unique()->email,
    'telefono'=>$faker->phoneNumber,
    'visitas'=>0,
    'esAgencia'=>$faker->boolean,
    'credito'=>$faker->randomNumber(7,false),
    ];
});
