<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('redirectURL')->nullable();
            $table->string('redirectRoute')->nullable();

            $table->string('currentRoute')->nullable();
            $table->string('currentUrl')->nullable();

            $table->integer('type')->default(1);

            $table->timestamp('readAt')->nullable();
            $table->string('readAtHumanFormat')->nullable();
            $table->integer('status')->default(0);
            // unseen 0
            // seen 1
            // hide 2

            $table->integer('createdBy')->nullable();
            $table->integer('forUser')->nullable();

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
        Schema::dropIfExists('notifications');
    }
}
