<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetPricesTablePricesValueInBigInTInsteadFloat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('Alter table precios Modify adulto DOUBLE(12,2)');
        DB::statement('Alter table precios Modify mayor DOUBLE(12,2)');
        DB::statement('Alter table precios Modify nino DOUBLE(12,2)');
        DB::update('UPDATE precios SET adulto=adulto*100');
        DB::update('UPDATE precios SET mayor=mayor*100');
        DB::update('UPDATE precios SET nino=nino*100');
        DB::statement('Alter table precios Modify adulto BIGINT');
        DB::statement('Alter table precios Modify mayor BIGINT');
        DB::statement('Alter table precios Modify nino BIGINT');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('Alter table precios Modify adulto DOUBLE(12,2)');
        DB::statement('Alter table precios Modify mayor DOUBLE(12,2)');
        DB::statement('Alter table precios Modify nino DOUBLE(12,2)');
        DB::update('UPDATE precios SET adulto=adulto/100');
        DB::update('UPDATE precios SET mayor=mayor/100');
        DB::update('UPDATE precios SET nino=nino/100');
    }
}
