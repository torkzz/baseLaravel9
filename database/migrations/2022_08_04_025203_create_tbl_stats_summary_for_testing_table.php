<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatsSummaryForTestingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stats_summary_for_testing', function (Blueprint $table) {
            $table->id();
            $table->date('txn_date')->comment("Transaction Date");
            $table->unsignedMediumInteger('user_id')->default(0);
            $table->unsignedMediumInteger('platform_id')->default(0)->comment("1 - HTTP | 2 - SMPP | 3 - DIY / KLIQ | 4 - Tally | 5 - Q | 6 - Reach | 7 - SFTP | 8 - SMTP\n");
            $table->unsignedMediumInteger('telco_id')->default(0)->comment("0: UNDEFINED | 1: GLOBE | 2: SMART | 3: SUN");
            $table->unsignedMediumInteger('connection_id')->default(0);
            $table->integer('total')->default(0);
            $table->integer('total_logs')->default(0);
            $table->unsignedTinyInteger('status_flag')->default(1)->comment("1: Sent | 2: Success | 3: Acknowledge(Success For Non-Globe)");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            
            $table->unique(['txn_date', 'user_id', 'platform_id', 'telco_id', 'connection_id', 'status_flag'], 'midx_uniq_tbl_stats');
            $table->index(['txn_date', 'status_flag', 'user_id'], 'idx_tbl_stats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stats_summary_for_testing');
    }
}
