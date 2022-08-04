<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberBotSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_bot_summary', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('viber_bot_campaign_id')->default(0);
            $table->integer('viber_bot_account_id')->default(0);
            $table->integer('total_received')->default(0);
            $table->integer('total_sent')->default(0);
            $table->integer('total_delivered')->default(0);
            $table->integer('total_failed')->default(0);
            $table->integer('total_seen')->default(0);
            $table->date('txn_date')->default('0000-00-00');
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['viber_bot_campaign_id', 'viber_bot_account_id', 'txn_date'], 'unique_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_viber_bot_summary');
    }
}
