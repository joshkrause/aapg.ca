<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceMealSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_meal_selections', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
			$table->integer('conference_id')->unsigned();
			$table->string('option')->nullable();
			$table->boolean('appetizer')->nullable()->default(0);
			$table->boolean('main_course')->nullable()->default(0);
			$table->boolean('dessert')->nullable()->default(0);
			$table->boolean('drink')->nullable()->default(0);
			$table->boolean('other')->nullable()->default(0);
		});

		Schema::table('conferences', function (Blueprint $table) {
			$table->boolean('meal_selection_required')->nullable()->default(0);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('conference_meal_selections');

		Schema::table('conferences', function (Blueprint $table) {
			$table->dropColumn('meal_selection_required');
		});
    }
}
