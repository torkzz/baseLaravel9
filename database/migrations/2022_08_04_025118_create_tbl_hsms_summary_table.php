<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHsmsSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hsms_summary', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->date('txn_date')->default('0000-00-00');
            $table->integer('hsms_id')->default(0);
            $table->integer('hsms_message_id')->default(0);
            $table->boolean('telco_id')->default(0);
            $table->integer('total_base')->default(0);
            $table->integer('total_success')->default(0);
            $table->integer('total_failed')->default(0);
            $table->integer('total_success_txn')->default(0);
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['txn_date', 'hsms_id', 'hsms_message_id', 'telco_id'], 'unique_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_hsms_summary');
    }
}
