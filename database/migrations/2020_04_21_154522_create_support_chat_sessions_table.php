<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportChatSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_chat_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('status')->nullable();
            
            /**
             * 
             * 1 started
             * 2 closed
             * 
             * */ 

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
        Schema::dropIfExists('support_chat_sessions');
    }
}
