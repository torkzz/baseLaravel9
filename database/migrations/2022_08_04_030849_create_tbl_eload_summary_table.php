<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEloadSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eload_summary', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->date('date');
            $table->integer('campaign_id')->default(0);
            $table->integer('eload_campaign_id')->default(0)->comment("from tbl_eload_keywords.id");
            $table->integer('total_success')->default(0);
            $table->integer('total_unrecognized')->default(0);
            $table->integer('total_invalid')->default(0);
            $table->integer('total_max_limit')->default(0);
            $table->integer('total_system_failure')->default(0);
            $table->boolean('status_flag')->default(1)->comment("1 = active, 0 = deleted");
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
        Schema::dropIfExists('tbl_eload_summary');
    }
}
