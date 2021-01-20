<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('address');
            $table->SmallInteger('addressNumber');
            $table->string('city');
            $table->string('province');
            $table->integer('postcode');
            $table->bigInteger('phone');
            $table->string('nameOnCard');
            $table->float('total', 6, 2);
            $table->string('payment_gateway')->default('stripe');
            $table->boolean('shipped')->default(false);
            $table->string('error')->nullable();

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
