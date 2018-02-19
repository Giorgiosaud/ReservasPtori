<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFloatToIntInReservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::update('UPDATE reservaciones SET montoTotal=montoTotal*100');
        DB::statement('Alter table reservaciones Modify montoTotal BIGINT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('Alter table reservaciones Modify montoTotal DOUBLE(12,2)');
        DB::update('UPDATE reservaciones SET montoTotal=montoTotal/100');
    }
}
