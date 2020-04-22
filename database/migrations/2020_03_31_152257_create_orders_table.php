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
            $table->bigIncrements('id');

            $table->text('orderDetails')->nullable();
            $table->integer('type')->nullable();
            $table->double('price')->nullable();
            $table->string('title')->nullable();

            $table->string('invoiceNumber')->nullable();

            $table->integer('createdBy')->nullable();


            $table->text('billingError')->nullable();
            $table->integer('billingStatus')->default(1);

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
