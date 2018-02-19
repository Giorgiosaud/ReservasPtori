<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetMercadopagoAmmountsValueInBigInTInsteadFloat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('Alter table mercadopagos Modify transaction_amount DOUBLE(12,2)');
        DB::statement('Alter table mercadopagos Modify finance_charge DOUBLE(12,2)');
        DB::statement('Alter table mercadopagos Modify total_paid_amount DOUBLE(12,2)');
        DB::statement('Alter table mercadopagos Modify net_received_amount DOUBLE(12,2)');

        DB::update('update mercadopagos SET transaction_amount =transaction_amount *100,finance_charge =finance_charge *100,total_paid_amount =total_paid_amount *100,net_received_amount =net_received_amount *100');


        DB::statement('Alter table mercadopagos Modify transaction_amount BIGINT');
        DB::statement('Alter table mercadopagos Modify finance_charge BIGINT');
        DB::statement('Alter table mercadopagos Modify total_paid_amount BIGINT');
        DB::statement('Alter table mercadopagos Modify net_received_amount BIGINT');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('Alter table mercadopagos Modify transaction_amount DOUBLE(12,2)');
        DB::statement('Alter table mercadopagos Modify finance_charge DOUBLE(12,2)');
        DB::statement('Alter table mercadopagos Modify total_paid_amount DOUBLE(12,2)');
        DB::statement('Alter table mercadopagos Modify net_received_amount DOUBLE(12,2)');

        DB::update('update mercadopagos SET transaction_amount =transaction_amount /100,finance_charge =finance_charge /100,total_paid_amount =total_paid_amount /100,net_received_amount =net_received_amount /100');
    }
}
