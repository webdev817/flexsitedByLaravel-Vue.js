<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_chats', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('message')->nullable();
            $table->integer('SupportChatSessionId')->nullable();

            $table->integer('createdBy')->nullable();
            $table->integer('isAttachment')->nullable();

            $table->string('path')->nullable();
            $table->string('fileName')->nullable();

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
        Schema::dropIfExists('support_chats');
    }
}
