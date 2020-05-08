<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('stripePlanMonthId')->nullable();
            $table->string('stripePlanYearId')->nullable();
            $table->string('stripePlanNumber')->nullable();


            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->double('priceYearlyMonthly')->nullable();
            $table->double('priceYearly')->nullable();
            $table->text('description')->nullable();

            $table->string('image')->nullable();

            $table->string('productName')->nullable();


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
        Schema::dropIfExists('plans');
    }
}
