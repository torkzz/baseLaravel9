<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHermesMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hermes_messages', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('hermes_campaign_id')->default(0);
            $table->string('session_id', 150)->default('');
            $table->integer('sender_id')->default(0);
            $table->integer('recipient_id')->default(0);
            $table->text('message');
            $table->integer('replied_by')->default(0);
            $table->boolean('is_read')->default(0);
            $table->boolean('status_flag')->default(1)->comment("0 -Deleted, 1 - Active , 2 - Inactive");
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
        Schema::dropIfExists('tbl_hermes_messages');
    }
}
