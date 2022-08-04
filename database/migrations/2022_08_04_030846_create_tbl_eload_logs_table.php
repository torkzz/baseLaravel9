<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEloadLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eload_logs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('eload_campaign_id')->default(0)->comment("from tbl_eload_keywords.id");
            $table->string('name', 50)->default('');
            $table->bigInteger('msisdn')->default(0);
            $table->double('amount')->default(0);
            $table->bigInteger('recipient')->default(0);
            $table->boolean('status_flag')->default(1)->comment("0 = deleted, 1 = active/success, 2 = invalid, 3 = unrecognized, 4 = limit_max, 5 = system_failure");
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
        Schema::dropIfExists('tbl_eload_logs');
    }
}
