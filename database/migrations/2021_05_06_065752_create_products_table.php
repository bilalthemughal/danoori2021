<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();

            $table->string('small_photo_path');
            $table->string('large_photo_path');
            $table->string('second_photo_path')->nullable();
            
            
            $table->boolean('is_active');
            $table->integer('stock');
            $table->float('original_price');
            $table->float('discounted_price')->nullable();
            $table->text('product_info');
            $table->foreignId('category_id');
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
        Schema::dropIfExists('products');
    }
}
