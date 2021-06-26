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
            $table->string('order_id');
            $table->integer('status')->default(0);
            $table->foreignId('user_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->float('sub_total');
            $table->float('total');
            $table->string('phone_number');
            $table->string('coupon')->nullable();
            $table->string('address');
            $table->string('city');
            $table->integer('total_products');
            $table->text('order_note')->nullable();
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
