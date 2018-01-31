<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create(/**
         * @param Blueprint $table
         */
            'product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->string('link');
            $table->integer('quantity');
            $table->string('color');
            $table->string('note');
            $table->bigInteger('price');
            $table->bigInteger('price_total');
            $table->rememberToken();
            $table->timestamps();
            //$table->foreign('idUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
