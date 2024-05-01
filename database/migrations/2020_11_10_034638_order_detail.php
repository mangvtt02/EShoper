<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_size');
            $table->unsignedBigInteger('id_topping');
            $table->integer('quantity');
            $table->double('price'); 
            $table->timestamps();

            $table->foreign('id_order')
                    ->references('id')->on('order')
                    ->onDelete('cascade');
            $table->foreign('id_product')
                    ->references('id')->on('product')
                    ->onDelete('cascade');
            $table->foreign('id_size')
                    ->references('id')->on('size')
                    ->onDelete('cascade');
            $table->foreign('id_topping')
                    ->references('id')->on('topping')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
