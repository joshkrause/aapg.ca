<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewMemberTicketPriceToConferenceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conference_options', function (Blueprint $table) {
			$table->integer('early_bird_new_member_ticket_price')->unsigned()->nullable();
			$table->integer('regular_new_member_ticket_price')->unsigned()->nullable();
		});

		Schema::table('conference_ticket_packages', function (Blueprint $table) {
            $table->integer('new_member_tickets')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conference_options', function (Blueprint $table) {
			$table->dropColumn('early_bird_new_member_ticket_price');
			$table->dropColumn('regular_new_member_ticket_price');
		});

		Schema::table('conference_ticket_packages', function (Blueprint $table) {
            $table->dropColumn('new_member_tickets');
        });
    }
}
