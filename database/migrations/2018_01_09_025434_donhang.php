<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Donhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(/**
         * @param Blueprint $table
         */
            'donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('link');
            $table->bigInteger('cost');
            $table->enum('status', ['pending','reject', 'error', 'approved', 'success']);
            $table->rememberToken();
            $table->timestamps();
//            $table->foreign('idUser')->references('id')->on('users');
        });
        Schema::table('donhang', function ($table){
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
