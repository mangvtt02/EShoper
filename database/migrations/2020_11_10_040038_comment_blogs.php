<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //comment_blogs
public function up()
{
    Schema::create('comment_blogs', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('id_blog');
        $table->unsignedBigInteger('id_user');
        $table->text('comment');              
        $table->timestamps();
        $table->foreign('id_blog')
                ->references('id')->on('blog')
                ->onDelete('cascade');
        $table->foreign('id_user')
                ->references('id')->on('users')
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
    Schema::dropIfExists('comment_blogs');
}
}
