<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_messages', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id');
            $table->integer('viber_bot_campaign_id')->default(0);
            $table->integer('user_id');
            $table->integer('sender_id')->default(0);
            $table->string('thread_id');
            $table->integer('recipient_id')->default(0);
            $table->mediumText('message');
            $table->string('chat_hostname', 15);
            $table->string('message_token', 20);
            $table->text('json_data');
            $table->string('sender_mask', 25)->nullable();
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('status_flag')->default(1);
            $table->boolean('type')->default(1);
            $table->boolean('is_read')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_viber_messages');
    }
}
