<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phonenumber',64)->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('password');
            $table->string('secret');
            $table->string('bank_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_user_name')->nullable();
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
        Schema::dropIfExists('users');
    }
}
