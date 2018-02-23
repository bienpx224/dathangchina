<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            //
            $table->increments('id');
            $table->integer('order_id');
            $table->string('title');
            $table->string('link',255);
            $table->string('image');
            $table->string('price')->nullable();
            $table->string('quantity');
            $table->string('cost')->nullable();
            $table->string('color')->nullable();
            $table->string('note')->nullable();
            $table->string('size')->nullable();
            $table->integer('state')->default(1);
            $table->integer('status')->default(1);  //  1 là đang chờ, 2 là đã chốt, 3 là hết hàng, 0 là đã hủy
            $table->timestamps();

            // $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
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
