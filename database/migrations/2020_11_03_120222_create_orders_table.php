<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customer_id')->nullable();
            $table->dateTime('ordered_at')->nullable();
            $table->double('current_lat')->nullable();
            $table->double('current_lng')->nullable();
            $table->double('distination_lat')->nullable();
            $table->double('distination_lng')->nullable();
            $table->enum('status' , ['user_created', 'user_canceled',
                                            'order_accepted', 'order_in_progress' ,'order_finish'])
                ->nullable();

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
        Schema::dropIfExists('orders');
    }
}
