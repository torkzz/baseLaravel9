<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHermesCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hermes_campaigns', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->text('welcome_message')->nullable();
            $table->string('email', 100)->default('');
            $table->string('hotline', 50)->default('');
            $table->integer('chat_campaign_id')->default(0)->comment("0 - Off | Else On");
            $table->integer('facebook_page_id')->default(0)->comment("0 - Off | Else On");
            $table->integer('viber_bot_id')->default(0)->comment("0 - Off | Else On");
            $table->string('hash_code', 150)->default('');
            $table->boolean('status_flag')->default(1)->comment("0 - Deleted | 1 - Active | 2 - Inactive");
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
        Schema::dropIfExists('tbl_hermes_campaigns');
    }
}
