<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullableSomeFieldsInFechasEspecialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fechas_especiales', function (Blueprint $table) {
            $table->string('clase')->nullable()->change();
            $table->text('descripcion')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fechas_especiales', function (Blueprint $table) {
            $table->string('clase')->nullable(false)->change();
            $table->text('descripcion')->nullable(false)->change();
        });
    }
}
