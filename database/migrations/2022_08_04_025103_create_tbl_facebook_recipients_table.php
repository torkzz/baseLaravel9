<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFacebookRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_facebook_recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facebook_campaign_id')->default(0);
            $table->integer('group_id')->comment("Mobile360.tbl_facebook_users.account_id");
            $table->string('facebook_id', 100);
            $table->unsignedTinyInteger('status_flag')->default(1)->comment("0:Inactive, 1: Active");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->index(['facebook_id', 'group_id'], 'idx_facebookid_groupid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_facebook_recipients');
    }
}
