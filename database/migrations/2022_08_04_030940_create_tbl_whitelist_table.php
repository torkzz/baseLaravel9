<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWhitelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_whitelist', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 100);
            $table->string('company', 100);
            $table->bigInteger('msisdn')->nullable();
            $table->integer('mo_credits')->default(0);
            $table->integer('mt_credits')->default(0);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->index(['company', 'msisdn'], 'idx_msisdn_company_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_whitelist');
    }
}
