<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('comment_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->string('content');
            $table->timestamps();

            $table->foreign('users_id')
                  ->references('users_id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('article_id')
                  ->references('id')
                  ->on('articles')
                  ->onDelete('cascade');
            $table->foreign('comment_id')
                  ->references('id')
                  ->on('comments')
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
        Schema::dropIfExists('replies');
    }

    public function comment()
    {
        return $this->belongsTo('Comment');
    }
}
