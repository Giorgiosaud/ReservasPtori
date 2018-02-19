<?php

namespace Tests\Unit;

use App\Reservacion;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function a_client_could_have_one_or_many_reservations()
    {
        $cliente=factory(Cliente::class)->create();
        $reservas=factory(Reservacion::class)->create([
            cliente_id=$cliente->id
        ]);
        $this->assertEquals($reservas,$cliente->reservaciones->first());
    }
}
