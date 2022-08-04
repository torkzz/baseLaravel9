<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMsisdnForTestingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_msisdn_for_testing', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('msisdn', 20)->nullable()->unique('idx_msisdn');
            $table->boolean('telco_id')->default(0);
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->index(['updated_at', 'telco_id'], 'idx_updated_telco');
            $table->index(['msisdn', 'status_flag'], 'idx_status');
            $table->index(['telco_id', 'status_flag'], 'idx_telco_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_msisdn_for_testing');
    }
}
