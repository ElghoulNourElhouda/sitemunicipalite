<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')
                  ->references('users_id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('article_id')
                  ->references('id')
                  ->on('articles')
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
        Schema::dropIfExists('likes');
    }
    public function article()
    {
        return $this->belongsTo('Article');
    }
}
