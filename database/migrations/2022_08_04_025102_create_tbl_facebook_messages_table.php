<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFacebookMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_facebook_messages', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id');
            $table->integer('sender_id');
            $table->string('thread_id');
            $table->mediumText('message');
            $table->mediumText('json_data');
            $table->string('watermark')->nullable();
            $table->string('transid')->nullable();
            $table->string('sender_mask', 25)->nullable();
            $table->integer('facebook_campaign_id')->default(0);
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('status_flag')->default(1);
            $table->boolean('type')->default(1);
            $table->integer('recipient_id');
            $table->boolean('is_read')->default(0);
            
            $table->index(['transid', 'status_flag'], 'idx_transid_status');
            $table->index(['watermark', 'status_flag'], 'idx_watermark_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_facebook_messages');
    }
}
