<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceTicketPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_ticket_packages', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
			$table->integer('conference_id')->unsigned();
			$table->string('name')->nullable();
			$table->text('description')->nullable();
			$table->integer('price')->unsigned()->nullable();
			$table->integer('early_bird_price')->unsigned()->nullable();
			$table->integer('member_tickets')->unsigned()->nullable();
			$table->integer('guest_tickets')->unsigned()->nullable();
			$table->integer('non_member_tickets')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conference_ticket_packages');
    }
}
