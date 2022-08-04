<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberBotRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_bot_recipients', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('viber_bot_campaign_id')->default(0);
            $table->integer('account_id')->default(0);
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
        Schema::dropIfExists('tbl_viber_bot_recipients');
    }
}
