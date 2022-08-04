<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatsSenderidBackup202201Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stats_senderid_backup_202201', function (Blueprint $table) {
            $table->id();
            $table->date('txn_date')->comment("Transaction Date");
            $table->string('server', 15)->default('all');
            $table->unsignedInteger('user_id')->default(0);
            $table->mediumInteger('telco_id')->default(0)->comment("0: UNDEFINED | Mobile360.telco");
            $table->string('sender_id', 20)->default('');
            $table->mediumInteger('connection_id')->default(0)->comment("Mobile360.tbl_connections");
            $table->unsignedTinyInteger('status_flag')->default(1)->comment("1: Request; 2:Success; 3:Acknowledge");
            $table->unsignedInteger('total')->default(0);
            $table->unsignedTinyInteger('premium_flag')->default(0);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['txn_date', 'server', 'user_id', 'telco_id', 'connection_id', 'sender_id', 'status_flag'], 'idx_server_id');
            $table->index(['txn_date', 'telco_id', 'sender_id', 'user_id'], 'idx_sender_id');
            $table->index(['txn_date', 'telco_id', 'status_flag'], 'idx_telco_status');
            $table->index(['txn_date', 'telco_id', 'sender_id'], 'idx_telco_status_sender');
            $table->index(['txn_date', 'telco_id', 'premium_flag'], 'idx_telco_status_premium');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stats_senderid_backup_202201');
    }
}
