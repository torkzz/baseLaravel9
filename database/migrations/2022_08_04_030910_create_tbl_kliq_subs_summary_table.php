<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqSubsSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_subs_summary', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->date('txn_date')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('telco_id')->default(0);
            $table->unsignedInteger('total_optin')->default(0);
            $table->unsignedInteger('total_optout')->default(0);
            $table->unsignedInteger('total_invalid')->default(0);
            $table->unsignedInteger('total_duplicate')->default(0);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['txn_date', 'group_id', 'user_id', 'telco_id'], 'idx_unique_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_subs_summary');
    }
}
