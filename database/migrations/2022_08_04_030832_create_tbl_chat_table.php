<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chat', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->index('user_id');
            $table->integer('campaign_id');
            $table->mediumInteger('platform_id')->default(0);
            $table->string('platform_options', 50)->default('[]')->comment("Send SMS Logs - send_logs; Auto Close Tickets - auto_close");
            $table->string('name');
            $table->string('keyword');
            $table->tinyInteger('duration_type');
            $table->timestamp('schedule_from')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('schedule_to')->useCurrent();
            $table->tinyInteger('status_flag');
            $table->timestamps();
            $table->boolean('chat_type')->default(1);
            $table->string('group_name', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chat');
    }
}
