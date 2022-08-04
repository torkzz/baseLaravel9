<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTelcoPrefixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_telco_prefix', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('telco_id');
            $table->unsignedBigInteger('prefix_base')->default(0)->index('idx_prefix_base');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(1);
            
            $table->unique(['telco_id', 'prefix_base'], 'midx_uniq_tbl_telco_prefix_base');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_telco_prefix');
    }
}
