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
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('email');
            $table->string('category')->nullable();
            $table->string('chapter')->nullable();
            $table->string('area')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
            // $table->timestamps()->nullable();
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
