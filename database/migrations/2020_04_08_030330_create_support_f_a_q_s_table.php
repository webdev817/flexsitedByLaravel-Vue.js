<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportFAQSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_f_a_q_s', function (Blueprint $table) {
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
        Schema::dropIfExists('support_f_a_q_s');
    }
}
