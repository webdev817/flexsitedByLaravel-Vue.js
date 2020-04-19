<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMilestoneChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_milestone_chats', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('projectId')->nullable();
            $table->integer('projectAttachmentId')->nullable();

            $table->text('comment')->nullable();
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
        Schema::dropIfExists('project_milestone_chats');
    }
}
