<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWrpKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wrp_keyword', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('keyword', 25);
            $table->integer('status_id')->default(0)->comment("0 - Inactive, 1 - Active");
            $table->integer('user_id');
            $table->boolean('priority_level')->default(0)->comment("0-Not Priority, 1-Low, 2-Normal, 3-High");
            $table->integer('mo_shortcode_id')->nullable();
            $table->unsignedInteger('mt_shortcode_id');
            $table->integer('keyword_alias_id');
            $table->unsignedTinyInteger('sender_type')->default(1)->comment("1:local;2:international");
            $table->smallInteger('sender_class')->default(0);
            $table->boolean('loa_flag')->default(0);
            $table->boolean('is_default')->default(0);
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
            $table->boolean('is_smtp')->default(0);
            
            $table->index(['status_id', 'user_id', 'keyword'], 'midx_wrp_keyword');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wrp_keyword');
    }
}
