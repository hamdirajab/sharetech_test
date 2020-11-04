<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->dateTime('driver_accepted_at')->nullable();
            $table->dateTime('driver_canceled_at')->nullable();
            $table->dateTime('order_finished_at')->nullable();
            $table->double('price')->nullable();
            $table->double('total_price')->nullable();
            $table->enum('status' , ['driver_accepted', 'driver_canceled',
                                            'user_canceled', 'order_in_progress',
                                            'order_finish'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers_orders');
    }
}
