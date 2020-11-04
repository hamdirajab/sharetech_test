<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = [];

    public function driver_order(){
        $this->belongsTo(DriverOrder::class , 'order_id');
    }


}
