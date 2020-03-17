<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();

            $table->string('code')->nullable();

            $table->boolean('freeLogo')->default(0);
            $table->boolean('freeFlayer')->default(0);
            $table->boolean('freeBusinessCard')->default(0);
            $table->boolean('freeOnePageWebsite')->default(0);
            $table->boolean('subscriptionDiscount')->default(0);
       

            $table->double('percentOff')->nullable();

            $table->integer('createdBy')->nullable();

            $table->string('status')->default(1);
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
        Schema::dropIfExists('coupons');
    }
}
