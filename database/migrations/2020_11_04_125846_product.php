<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_type');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('unit_price');
            $table->integer('discount');
            $table->string('image');
            $table->string('unit');
            $table->integer('total_rating')->nullable();
            $table->integer('number_star')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->foreign('id_type')
                    ->references('id')->on('type_product')
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
        Schema::dropIfExists('product');
    }
}
