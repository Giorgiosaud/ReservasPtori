<?php

namespace App;

use App\Interfaces\atributosDePago;
use App\Traits\RegistrarPago;
use Illuminate\Database\Eloquent\Model;

class Mercadopago extends Model implements atributosDePago
{
    use RegistrarPago;
    //protected $primaryKey='idMercadoPago';
    protected $fillable = [
        'id',
        'idMercadoPago',
        'site_id',
        'operation_type',
        'order_id',
        'external_reference',
        'status',
        'status_detail',
        'payment_type',
        'date_created',
        'last_modified',
        'date_approved',
        'money_release_date',
        'currency_id',
        'transaction_amount',
        'shipping_cost',
        'finance_charge',
        'total_paid_amount',
        'net_received_amount',
        'reason',
        'payerId',
        'payerfirst_name',
        'payerlast_name',
        'payeremail',
        'payernickname',
        'identificationType',
        'identificationNumber',
        'phonearea_code',
        'phonenumber',
        'phoneextension',
        'collectorid',
        'collectorfirst_name',
        'collectorlast_name',
        'collectoremail',
        'collectornickname',
        'collectorphonearea_code',
        'collectorphonenumber',
        'collectorphoneextension',
    ];


    public function pagos()
    {
        return $this->morphMany('App\Pago', 'pago');
    }

    public function getNumeroDeReservacionAttribute()
    {
        return $this->attributes['external_reference'];

    }

    public function getmontoPagadoAttribute()
    {
        return $this->attributes['transaction_amount']/1.1;

    }


}
