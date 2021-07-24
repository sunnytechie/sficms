<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');

            $table->string('avatar');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('Area');
            $table->string('chapter_capacity');
            $table->string('city');
            $table->string('country');
            $table->string('center_address');
            $table->string('zip_code')->nullable();

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
        Schema::dropIfExists('profiles');
    }
}
