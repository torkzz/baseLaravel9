<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGroupRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_group_rates', function (Blueprint $table) {
            $table->mediumInteger('id')->primary();
            $table->mediumInteger('group_id')->default(0);
            $table->decimal('nglobe', 10, 4)->default(0.0000);
            $table->decimal('globe', 10, 4)->default(0.0000);
            $table->integer('min_txn')->default(0);
            $table->integer('max_txn')->default(0);
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(1);
            $table->decimal('mo_globe', 10, 4)->default(0.0000);
            $table->decimal('mo_nglobe', 10, 4)->default(0.0000);
            $table->decimal('fixed_rate', 10, 4)->default(0.0000);
            $table->string('month', 10);
            $table->decimal('excess_rate', 10, 4)->default(0.0000);
            $table->decimal('premium_rate', 10, 4)->default(0.0000);
            $table->decimal('mo_fee', 12, 4)->default(0.0000);
            $table->decimal('mt_fee', 12, 4)->default(0.0000);
            $table->decimal('mt_pay', 12, 4)->default(0.0000);
            $table->decimal('mo_pay', 12, 4)->default(0.0000);
            
            $table->unique(['group_id', 'month', 'min_txn'], 'uniq_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_group_rates');
    }
}
