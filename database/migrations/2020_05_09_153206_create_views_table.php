<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('offre_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')
                  ->references('users_id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('offre_id')
                  ->references('id')
                  ->on('offres')
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
       Schema::dropIfExists('views');
    }
}
