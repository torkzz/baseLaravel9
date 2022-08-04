<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMoKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mo_keywords', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('campaign_id')->default(0);
            $table->mediumInteger('shortcode_id')->default(0);
            $table->string('keyword', 30);
            $table->string('variables', 30)->nullable();
            $table->integer('ac_id')->default(0);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->integer('status_flag')->nullable();
            $table->mediumInteger('user_id')->default(0);
            $table->mediumInteger('platform_id')->default(0);
            $table->integer('is_default')->default(0);
            
            $table->index(['campaign_id', 'shortcode_id', 'keyword', 'variables'], 'idx_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_mo_keywords');
    }
}
