<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_summary', function (Blueprint $table) {
            $table->integer('summary_id')->primary();
            $table->integer('user_id');
            $table->integer('platform_id')->comment("1 for HTTP ; 2 for SMPP");
            $table->integer('telco_id')->default(0);
            $table->integer('total_sent')->default(0);
            $table->integer('total_success')->default(0);
            $table->date('date')->default('0000-00-00');
            
            $table->unique(['user_id', 'platform_id', 'telco_id', 'date'], 'uniqueUserIdxPlatformIdxTelcoIdxDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_summary');
    }
}
