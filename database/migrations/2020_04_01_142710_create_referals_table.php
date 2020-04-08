<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referals', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('link')->nullable();

            // $table->integer('userInvitedId')->nullable();
            $table->integer('userInvitedBy')->nullable();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('businessPhoneNumber')->nullable();

            $table->integer('logoDesign')->default(0);
            $table->integer('businessCardDesign')->default(0);
            $table->integer('flayerDesign')->default(0);
            $table->integer('Website')->default(0);
            $table->integer('marketing')->default(0);

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
        Schema::dropIfExists('referals');
    }
}
