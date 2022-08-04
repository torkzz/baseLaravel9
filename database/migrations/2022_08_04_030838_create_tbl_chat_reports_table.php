<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChatReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chat_reports', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->date('txn_date')->default('0000-00-00');
            $table->integer('chat_id')->default(0);
            $table->integer('telco_id')->default(0);
            $table->integer('total_inbound')->default(0);
            $table->integer('total_auto_reply')->default(0);
            $table->integer('total_manual_reply')->default(0);
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
            
            $table->unique(['chat_id', 'txn_date', 'telco_id'], 'tbl_chat_reports_chat_id_IDX');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chat_reports');
    }
}
