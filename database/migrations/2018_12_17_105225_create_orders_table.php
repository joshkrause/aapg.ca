<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('ticket_type');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('total');
            $table->integer('fees')->default(0);
            $table->string('stripe_id')->nullable();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
