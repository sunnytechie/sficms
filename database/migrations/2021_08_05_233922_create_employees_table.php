<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('external_id')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('state')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('country')->nullable();
            $table->string('contact')->nullable();
            $table->string('sex')->nullable();
            $table->text('about')->nullable();
            $table->text('health')->nullable();

            $table->string('positon');
            $table->string('department')->nullable();
            $table->string('unit')->nullable();
            $table->string('unit_head')->nullable();
            $table->string('office_building')->nullable();
            $table->string('supervisor_name');

            $table->string('nextkin_name')->nullable();
            $table->string('nextkin_address')->nullable();
            $table->string('nextkin_city')->nullable();
            $table->string('nextkin_phone')->nullable();
            $table->string('nextkin_country')->nullable();
            $table->string('nextkin_email')->nullable();
            $table->string('nextkin_state')->nullable();
            $table->string('nextkin_relationship')->nullable();
            $table->string('nextkin_sex')->nullable();

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
        Schema::dropIfExists('employees');
    }
}
