<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
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
            $table->integer('idUser')->unsigned();
            $table->string('note');
            $table->timestamp('ordertime');
            $table->timestamp('approvedtime');
            $table->timestamp('transporttime');
            $table->timestamp('finishtime');
            $table->bigInteger('cost');
            $table->enum('status', ['pending','reject', 'error', 'approved', 'success']);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('order', function ($table){
            $table->foreign('idUser')->references('id')->on('users');
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
