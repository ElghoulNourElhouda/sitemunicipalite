<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondidaturesTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condidatures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('offre_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('body');
            $table->string('docs')->nullable();
            $table->timestamps();
            
            $table->foreign('users_id')
                  ->references('users_id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('offre_id')
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
        Schema::dropIfExists('comments');
    }

    public function article()
    {
        return $this->belongsTo('Article');
    }
}
