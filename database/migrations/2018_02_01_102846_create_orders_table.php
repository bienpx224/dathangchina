<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            //
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('total_cost')->default(0);
            $table->string('note')->nullable();
            $table->integer('state')->default(1);
            $table->enum('status', ['chưa gửi','đang xử lý', 'đã báo giá', 'đang đặt hàng', 'thành công', 'đã hủy']);
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
