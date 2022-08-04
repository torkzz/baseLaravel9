<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHermesSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hermes_summary', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->date('txn_date')->default('0000-00-00');
            $table->integer('hermes_campaign_id')->default(0);
            $table->mediumInteger('total_received')->default(0);
            $table->mediumInteger('total_sent')->default(0);
            $table->mediumInteger('total_failed')->default(0);
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['txn_date', 'user_id', 'hermes_campaign_id'], 'idx_user_campaign_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_hermes_summary');
    }
}
