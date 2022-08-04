<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHsmsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hsms_messages', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('hsms_id')->default(0);
            $table->text('content');
            $table->string('optout_footer', 100)->default('');
            $table->integer('target_base')->default(0);
            $table->boolean('msg_part')->default(1);
            $table->string('sender_id', 25)->default('0');
            $table->boolean('status_flag')->default(1)->comment("1 - Test Broadcast; 2 - Ready for Broadcast; 3 - Scheduled; 4 - Ongoing; 5 - Completed");
            $table->dateTime('scheduled_at')->default('0000-00-00 00:00:00');
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
        Schema::dropIfExists('tbl_hsms_messages');
    }
}
