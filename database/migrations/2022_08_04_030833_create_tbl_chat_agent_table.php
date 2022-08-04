<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChatAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chat_agent', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('subuser_id');
            $table->integer('chat_id');
            $table->integer('status_flag');
            $table->integer('user_id');
            $table->timestamps();
            $table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chat_agent');
    }
}
