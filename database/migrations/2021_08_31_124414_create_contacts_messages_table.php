<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contacts_id');
            $table->unsignedBigInteger('messages_id');
            $table->timestamps();

            $table->foreign('contacts_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('messages_id')->references('id')->on('messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_messages');
    }
}
