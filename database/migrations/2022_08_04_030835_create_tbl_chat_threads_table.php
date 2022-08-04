<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChatThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chat_threads', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('chat_id');
            $table->string('msisdn', 25);
            $table->integer('unread_count');
            $table->text('remarks')->nullable();
            $table->string('rcvd_transid', 150)->default('');
            $table->timestamps();
            $table->boolean('status_flag')->default(0);
            
            $table->foreign('chat_id', 'fk_tbl_chat_threads_chat_id')->references('id')->on('tbl_chat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chat_threads');
    }
}
