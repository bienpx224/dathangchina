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
            $table->string('link');
            $table->string('image');
            $table->string('price');
            $table->string('quantity');
            $table->string('cost');
            $table->string('color');
            $table->string('note');
            $table->string('size');
            $table->integer('state')->default(1);
            $table->integer('status')->default(1);
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
