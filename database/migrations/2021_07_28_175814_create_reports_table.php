<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id');
            
            $table->text('area');
            $table->text('date_week');
            $table->text('date_month');
            $table->text('date_year');

            $table->string('chapter1');
            $table->string('chapter2')->nullable();
            $table->string('chapter3')->nullable();
            $table->string('chapter4')->nullable();
            $table->string('chapter5')->nullable();
            $table->string('chapter6')->nullable();
            $table->string('chapter7')->nullable();
            $table->string('chapter8')->nullable();
            $table->string('chapter9')->nullable();
            $table->string('chapter10')->nullable();
            $table->string('chapter11')->nullable();
            $table->string('chapter12')->nullable();

            $table->string('day1');
            $table->string('day2')->nullable();
            $table->string('day3')->nullable();
            $table->string('day4')->nullable();
            $table->string('day5')->nullable();
            $table->string('day6')->nullable();
            $table->string('day7')->nullable();
            $table->string('day8')->nullable();
            $table->string('day9')->nullable();
            $table->string('day10')->nullable();
            $table->string('day11')->nullable();
            $table->string('day12')->nullable();

            $table->string('capacity1');
            $table->string('capacity2')->nullable();
            $table->string('capacity3')->nullable();
            $table->string('capacity4')->nullable();
            $table->string('capacity5')->nullable();
            $table->string('capacity6')->nullable();
            $table->string('capacity7')->nullable();
            $table->string('capacity8')->nullable();
            $table->string('capacity9')->nullable();
            $table->string('capacity10')->nullable();
            $table->string('capacity11')->nullable();
            $table->string('capacity12')->nullable();

            $table->string('income1');
            $table->string('income2')->nullable();
            $table->string('income3')->nullable();
            $table->string('income4')->nullable();
            $table->string('income5')->nullable();
            $table->string('income6')->nullable();
            $table->string('income7')->nullable();
            $table->string('income8')->nullable();
            $table->string('income9')->nullable();
            $table->string('income10')->nullable();
            $table->string('income11')->nullable();
            $table->string('income12')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
