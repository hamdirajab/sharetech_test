<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverOrder extends Model
{
    protected $table = 'drivers_orders';

    protected $guarded = [];

    public function current_order(){
        $this->hasOne(Order::class , 'order_id')
            ->where('status' , 'driver_accepted');
    }

    public function orders(){
        $this->hasMany(Order::class , 'order_id');
    }
}
