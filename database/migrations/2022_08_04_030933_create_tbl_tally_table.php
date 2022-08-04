<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTallyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tally', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('user_id')->index('fk_user_id');
            $table->mediumInteger('campaign_id')->index('fk_service_id');
            $table->string('tally_name', 50);
            $table->string('tally_keyword', 50);
            $table->string('tally_secondary_keyword', 50)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('start_date')->default('0000-00-00 00:00:00');
            $table->timestamp('end_date')->default('0000-00-00 00:00:00');
            $table->unsignedTinyInteger('no_options')->default(30);
            $table->unsignedTinyInteger('vote_limit')->default(0);
            $table->boolean('is_microsite_public')->default(0);
            $table->string('microsite_key', 100)->default('0');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(1);
            
            $table->unique(['user_id', 'campaign_id', 'tally_keyword', 'tally_secondary_keyword'], 'midx_uniq_tbl_tally');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tally');
    }
}
