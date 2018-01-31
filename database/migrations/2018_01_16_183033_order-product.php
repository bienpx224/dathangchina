<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderProduct extends Migration
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
            'order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idOrder')->unsigned();
            $table->integer('idProduct')->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('order', function ($table){
            $table->foreign('idUser')->references('id')->on('users')
                vds
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
