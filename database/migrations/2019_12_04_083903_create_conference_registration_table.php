<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_registrations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('conference_id');
			$table->integer('order_id')->nullable();
			$table->string('name')->nullable();
			$table->string('ticket')->nullable();
			$table->integer('ticket_price')->nullable();
			$table->integer('meal_selection_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conference_registrations');
    }
}
