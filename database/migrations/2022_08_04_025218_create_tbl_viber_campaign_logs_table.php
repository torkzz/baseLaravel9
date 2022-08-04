<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberCampaignLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_campaign_logs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('viber_campaign_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->string('event', 100)->default('');
            $table->bigInteger('msisdn')->default(0);
            $table->string('trans_id', 150)->default('');
            $table->text('json_data');
            $table->text('json_response');
            $table->boolean('status_flag')->default(1)->comment("1:Active;0:Inactive");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_viber_campaign_logs');
    }
}
