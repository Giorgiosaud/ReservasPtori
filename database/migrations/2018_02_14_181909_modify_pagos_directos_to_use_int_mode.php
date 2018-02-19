<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPagosDirectosToUseIntMode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos_directos', function (Blueprint $table) {
            $table->dropColumn('fecha');
        });
        DB::statement('Alter table pagos_directos Modify monto DOUBLE(12,2)');
        DB::update('UPDATE pagos_directos SET monto=monto*100');
        DB::statement('Alter table pagos_directos Modify monto BIGINT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos_directos', function (Blueprint $table) {
            $table->date('fecha')->nullable()->default(Carbon::now());
        });
        DB::statement('Alter table pagos_directos Modify monto DOUBLE(12,2)');
        DB::update('UPDATE pagos_directos SET monto=monto/100');
    }
}
