<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSummaryReportTallyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_summary_report_tally', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('tally_id');
            $table->mediumInteger('service_id')->nullable();
            $table->integer('valid')->nullable();
            $table->integer('invalid')->nullable();
            $table->integer('duplicate')->nullable();
            $table->integer('telco_id')->nullable();
            $table->string('telco', 20)->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['tally_id', 'service_id', 'telco_id', 'created_at'], 'midx_uniq_tbl_summary_report_tally');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_summary_report_tally');
    }
}
