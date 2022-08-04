<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMtContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mt_contents', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('campaign_id')->default(0);
            $table->mediumInteger('shortcode_id');
            $table->mediumInteger('scenario_id');
            $table->integer('sender_id')->default(0);
            $table->boolean('status_flag')->default(1);
            $table->text('content');
            $table->integer('msg_index');
            $table->mediumInteger('charging_type_id');
            $table->mediumInteger('tariff_id')->nullable();
            $table->string('whitelist', 250)->nullable();
            $table->boolean('is_masked')->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->index(['campaign_id', 'shortcode_id', 'scenario_id', 'msg_index', 'charging_type_id', 'tariff_id', 'whitelist', 'is_masked', 'sender_id'], 'idx_contents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_mt_contents');
    }
}
