<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnBoardingFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_boarding_faqs', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('category')->nullable();
            $table->string('question')->nullable();
            $table->text('answer')->nullable();

            $table->integer('status')->default(0);
            $table->integer('createdBy')->nullable();


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
        Schema::dropIfExists('on_boarding_faqs');
    }
}
