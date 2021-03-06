<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWizeredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizereds', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->string('userId')->nullable();

            $table->string('json')->nullable();

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
        Schema::dropIfExists('wizereds');
    }
}
