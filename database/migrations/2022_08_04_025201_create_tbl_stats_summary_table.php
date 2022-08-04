<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatsSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stats_summary', function (Blueprint $table) {
            $table->id();
            $table->date('txn_date')->comment("Transaction Date");
            $table->unsignedMediumInteger('user_id');
            $table->unsignedMediumInteger('platform_id')->comment("1 HTTP | 2 SMPP | 3 DIY/KLIQ | 4-6 MS | 7 SFTP | 8 SMTP | 10 MO");
            $table->unsignedMediumInteger('telco_id');
            $table->unsignedInteger('total');
            $table->unsignedTinyInteger('status_flag')->default(1)->comment("1: Sent | 2: Success | 3: Acknowledge");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->integer('connection_id')->default(0);
            
            $table->unique(['txn_date', 'user_id', 'platform_id', 'telco_id', 'status_flag', 'connection_id'], 'midx_uniq_tbl_stats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stats_summary');
    }
}
