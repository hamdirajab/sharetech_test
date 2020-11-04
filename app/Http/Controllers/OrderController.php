<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {

//        $this->validate($request,[
//            'customer_id' => 'required',
//            'ordered_at' => 'required',
//        ]);

        DB::transaction(function () use ($request) {
            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->ordered_at =  Carbon::now();
            $order->current_lat = $request->current_lat;
            $order->current_lng = $request->current_lng;
            $order->distination_lat = $request->distination_lat;
            $order->distination_lng = $request->distination_lng;
            $order->status = 'user_created';
            $order->save();
        });

        $message = 'Order Created';
        return response()->json(compact('message'), 200);
    }

}
