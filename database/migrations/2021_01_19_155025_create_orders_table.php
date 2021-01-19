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
            $table->id();

            $table->SmallInteger('productId');
            $table->SmallInteger('quantity')->default(1);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('address');
            $table->SmallInteger('addressNumber');
            $table->integer('postcode');
            $table->integer('cardNumber');
            $table->float('amount', 6, 2);

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
