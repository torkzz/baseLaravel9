<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberDirectLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_direct_logs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('trans_id', 150)->default('');
            $table->string('token', 150)->default('');
            $table->integer('user_id')->default(0);
            $table->integer('viber_campaign_id')->default(0);
            $table->string('event', 100)->default('');
            $table->bigInteger('msisdn')->default(0);
            $table->text('json_data');
            $table->text('json_response');
            $table->integer('connection_id')->default(0);
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->index(['trans_id', 'token', 'status_flag', 'viber_campaign_id'], 'idx_trans_token_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_viber_direct_logs');
    }
}
