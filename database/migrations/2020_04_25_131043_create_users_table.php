<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('users_id');
            $table->string('username');
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('gender')->nullable();
            $table->text('avatar')->nullable();
            $table->string('password');
            $table->boolean('admin')->default(0);
            $table->boolean('agent')->default(0);
            $table->string('location')->nullable();
            $table->tinyInteger('verified')->default(0);
            $table->boolean('blocked')->default(0); 
            $table->string('email_token')->nullable();
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
        Schema::drop('users');
    }
}
