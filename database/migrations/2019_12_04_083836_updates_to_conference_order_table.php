<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatesToConferenceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
			$table->integer('conference_id')->default('0');
			$table->string('ticket_type')->nullable()->change();
			$table->integer('quantity')->nullable()->change();
			$table->integer('guests')->nullable()->change();
			$table->string('payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('conference_id');
			$table->string('ticket_type')->change();
			$table->integer('quantity')->change();
			$table->integer('guests')->change();
			$table->dropColumn('payment');
        });
    }
}
