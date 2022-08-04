<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChatConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chat_conversations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('thread_id');
            $table->text('message');
            $table->integer('msg_part');
            $table->tinyInteger('type');
            $table->integer('replied_by')->default(0)->comment("0 - For Admin, Inbound and Auto Reply. Subuser Id - For Subusers");
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->foreign('thread_id', 'fk_tbl_chat_conversations_thread_id')->references('id')->on('tbl_chat_threads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chat_conversations');
    }
}
