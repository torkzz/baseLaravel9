<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberBotCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_bot_campaign', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 250)->default('');
            $table->integer('campaign_id')->default(0);
            $table->string('title', 50)->default('');
            $table->text('message');
            $table->dateTime('scheduled_at')->default('0000-00-00 00:00:00');
            $table->boolean('campaign_type')->default(0)->comment("1 - Text Only, 2 - Text with CTA, 3 - Text with Picture");
            $table->boolean('broadcast_type')->default(0)->comment("1 - Scheduled, 2 - Send Now");
            $table->text('cta_link');
            $table->string('cta_label', 150)->default('');
            $table->text('cta_image');
            $table->boolean('status_flag')->default(1);
            $table->integer('subuser_id')->default(0);
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
        Schema::dropIfExists('tbl_viber_bot_campaign');
    }
}
