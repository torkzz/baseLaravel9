<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_rates', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('user_id')->default(0);
            $table->decimal('nglobe', 10, 4)->default(0.0000);
            $table->decimal('globe', 10, 4)->default(0.0000);
            $table->unsignedInteger('min_txn')->default(0);
            $table->integer('max_txn')->default(0);
            $table->integer('max_txn_mt')->default(0);
            $table->integer('max_txn_mo')->default(0);
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(1);
            $table->decimal('mo_globe', 10, 4)->default(0.0000);
            $table->decimal('mo_nglobe', 10, 4)->default(0.0000);
            $table->decimal('dito', 10, 4)->default(0.0000);
            $table->decimal('mo_dito', 10, 4)->default(0.0000);
            $table->decimal('fixed_rate', 15, 4)->default(0.0000);
            $table->string('month', 10);
            $table->decimal('excess_rate', 10, 4)->default(0.0000);
            $table->decimal('excess_rate_mo', 10, 4)->default(0.0000);
            $table->decimal('premium_rate', 10, 4)->default(0.0000);
            $table->decimal('mo_fee', 12, 4)->default(0.0000);
            $table->decimal('mt_fee', 12, 4)->default(0.0000);
            $table->decimal('mt_pay', 12, 4)->default(0.0000);
            $table->decimal('mo_pay', 12, 4)->default(0.0000);
            $table->decimal('viber_mt_rate', 7, 4)->default(0.0000);
            $table->decimal('viber_mo_rate', 7, 4)->default(0.0000);
            $table->decimal('sms_failover_rate', 7, 4)->default(0.0000);
            $table->integer('max_txn_viber')->default(0);
            $table->integer('max_txn_viber_mt')->default(0);
            $table->integer('max_txn_viber_mo')->default(0);
            $table->integer('credit_limit')->default(0);
            $table->decimal('sms_failover_rate_ng', 7, 4)->default(0.0000);
            $table->decimal('sms_failover_rate_dito', 7, 4)->default(0.0000);
            
            $table->unique(['user_id', 'month', 'min_txn'], 'uniq_user');
            $table->index(['user_id', 'month', 'min_txn', 'status_flag'], 'idx_user_rates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_rates');
    }
}
