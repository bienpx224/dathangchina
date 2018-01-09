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
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idUser');
            $table->string('name');
            $table->string('phonenumber')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('password');
            $table->string('secret');
            $table->string('bank_number')->default("");
            $table->string('bank_name')->default("");
            $table->string('bank_user_name')->default("");
            $table->tinyInteger('authority')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->rememberToken();
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
        //
    }
}
