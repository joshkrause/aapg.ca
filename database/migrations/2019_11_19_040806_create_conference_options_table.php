<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_options', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
			$table->integer('conference_id')->unsigned();
			$table->dateTime('registration_start')->nullable();
			$table->dateTime('registration_end')->nullable();
			$table->dateTime('early_bird_registration_start')->nullable();
			$table->dateTime('early_bird_registration_end')->nullable();
			$table->integer('early_bird_member_ticket_price')->unsigned()->nullable();
			$table->integer('early_bird_guest_ticket_price')->unsigned()->nullable();
			$table->integer('early_bird_non_member_ticket_price')->unsigned()->nullable();
			$table->integer('regular_member_ticket_price')->unsigned()->nullable();
			$table->integer('regular_guest_ticket_price')->unsigned()->nullable();
			$table->integer('regular_non_member_ticket_price')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conference_options');
    }
}
