<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_campaigns', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('service_type_id')->index('fk_service_type_id');
            $table->boolean('is_trial_campaign')->default(0);
            $table->bigInteger('shortcode_id');
            $table->integer('sender_id')->default(0);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->unsignedTinyInteger('status_flag')->default(1);
            
            $table->index(['status_flag', 'created_at'], 'idx_status_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_campaigns');
    }
}
