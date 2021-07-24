<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('email');
            $table->integer('user_id')->unsigned();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('states_id')->unsigned()->nullable();
            $table->integer('areas_id')->unsigned()->nullable();
            $table->integer('chapters_id')->unsigned()->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
