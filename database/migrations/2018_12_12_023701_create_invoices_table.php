<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->text('description')->nullable();
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('fees');
            $table->integer('total');
            $table->boolean('paid')->default(0);
            $table->dateTime('payment_date')->nullable();
            $table->string('payment')->nullable();
            $table->string('stripe_id');
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
