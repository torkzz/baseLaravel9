<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_campaign', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 250)->default('');
            $table->integer('campaign_id')->default(0);
            $table->text('message');
            $table->integer('sender_id')->default(0);
            $table->dateTime('scheduled_at')->default('0000-00-00 00:00:00');
            $table->boolean('campaign_type')->default(0)->comment("1 - Text Only, 2 - Text with CTA");
            $table->boolean('label')->default(0);
            $table->boolean('broadcast_type')->default(0)->comment("1 - Send Now, 2 - Scheduled");
            $table->boolean('media_type')->default(0);
            $table->text('cta_link');
            $table->string('cta_label', 150)->default('');
            $table->text('cta_image');
            $table->text('cta_video')->nullable();
            $table->integer('video_duration')->default(0);
            $table->integer('video_file_size')->default(0);
            $table->integer('sms_senderid')->default(0);
            $table->text('sms_message');
            $table->integer('sms_ttl')->default(0);
            $table->string('optout_footer', 100)->default('');
            $table->boolean('optout_type')->default(1)->comment("1 - via text, 2 - via link");
            $table->boolean('send_unique')->default(0);
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
        Schema::dropIfExists('tbl_viber_campaign');
    }
}
