<?php

namespace App\Http\Controllers;

use App\Models\DriverOrder;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverOrderController extends Controller
{
    public function accept_order(Request $request)
    {
//        $this->validate($request,[
//            'customer_id' => 'required',
//            'ordered_at' => 'required',
//        ]);

        DB::transaction(function () use ($request) {
            $driverOrder = new DriverOrder();
            $driverOrder->order_id = $request->order_id;
            $driverOrder->driver_id = $request->driver_id;
            $driverOrder->driver_canceled_at = Carbon::now();
            $driverOrder->status = 'driver_accepted';
            $driverOrder->save();

            $order = Order::find($request->order_id);
            $order->status = 'order_accepted';
            $order->save();
        });

        return response()->json(['message' => 'Driver accept order.']);
    }

    public function cancel_order(Request $request)
    {
//        $this->validate($request,[
//            'customer_id' => 'required',
//            'ordered_at' => 'required',
//        ]);
        DB::transaction(function () use ($request) {
            $driverOrder = DriverOrder::find($request->driver_order_id);
            if ($driverOrder){
                $driverOrder->status = 'driver_canceled';
                $driverOrder->driver_canceled_at = Carbon::now();
                $driverOrder->save();

                $order = Order::find($driverOrder->order_id);
                $order->status = 'user_created';
                $order->save();
            }
        });


        return response()->json(['message' => 'Driver cancel order.']);
    }
}
