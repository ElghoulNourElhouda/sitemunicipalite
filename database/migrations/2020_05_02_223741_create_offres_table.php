<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->string('work');
            $table->string('level');
            $table->string('formation');
            $table->text('description');
            $table->string('location');
            $table->string('picture');
            $table->integer('available')->default('1');
            $table->integer('commenting')->default('1');
            $table->integer('blocked')->default('0');

            $table->timestamps();
            $table->timestamp('published_at')->useCurrent();
            
            $table->foreign('users_id')
                  ->references('users_id')
                  ->on('users')
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
        Schema::dropIfExists('offres');
    }
}
