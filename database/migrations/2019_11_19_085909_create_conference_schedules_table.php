<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_schedules', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
			$table->integer('conference_id')->unsigned();
			$table->string('title')->nullable();
			$table->string('speaker')->nullable();
			$table->text('description')->nullable();
			$table->dateTime('start')->nullable();
			$table->dateTime('end')->nullable();
			$table->string('location')->nullable();
			$table->string('sponsor')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conference_schedules');
    }
}
