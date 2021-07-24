<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id');
            
            $table->text('area');
            $table->text('chapter');
            $table->text('date_month');
            $table->text('date_week');
            $table->text('date_day');
            $table->string('capacity')->nullable();
            $table->string('tithe_money')->nullable();
            $table->string('tithe_hq')->nullable();
            $table->integer('close_entry')->default('0');

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
        Schema::dropIfExists('attendances');
    }
}
