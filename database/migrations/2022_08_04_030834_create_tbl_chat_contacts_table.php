<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChatContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chat_contacts', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('chat_id')->nullable();
            $table->string('name', 150)->nullable();
            $table->string('msisdn', 25);
            $table->integer('status_flag')->nullable();
            $table->timestamps();
            $table->integer('user_id')->nullable();
            
            $table->unique(['user_id', 'msisdn', 'status_flag'], 'uidx_user_msisdn_status');
            $table->index(['msisdn', 'user_id', 'status_flag'], 'idx_user_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chat_contacts');
    }
}
