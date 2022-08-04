<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_summary', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('kliq_id')->default(0);
            $table->integer('telco_id')->default(0);
            $table->integer('total_base')->default(0);
            $table->integer('total_success')->default(0);
            $table->integer('total_failed')->default(0);
            $table->integer('total_success_txn')->default(0);
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            
            $table->unique(['kliq_id', 'telco_id', 'created_at'], 'idx_tbl_kliq_summary_kliq_id_telco_id_created_at');
            $table->index(['kliq_id', 'status_flag'], 'idx_kliq_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_summary');
    }
}
