<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatsMonthlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stats_monthly', function (Blueprint $table) {
            $table->increments('id');
            $table->date('txn_month')->comment("Transaction Month");
            $table->unsignedMediumInteger('user_id')->default(0);
            $table->unsignedMediumInteger('platform_id')->default(0);
            $table->unsignedMediumInteger('telco_id')->default(0);
            $table->unsignedMediumInteger('connection_id')->default(0);
            $table->integer('total')->default(0);
            $table->integer('total_logs')->default(0);
            $table->unsignedTinyInteger('status_flag')->default(1)->comment("1: Sent | 2: Success | 3: Acknowledge");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            
            $table->unique(['txn_month', 'user_id', 'platform_id', 'telco_id', 'connection_id', 'status_flag'], 'midx_uniq_tbl_stats_monthly');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stats_monthly');
    }
}
