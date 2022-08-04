<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->integer('detail_id')->primary();
            $table->integer('user_id')->default(0);
            $table->integer('platform_id')->default(0)->comment("1 HTTP ; 2 SMPP");
            $table->string('transid', 150)->index('idx_transaction_detail_trans_id');
            $table->integer('telco_id')->default(0);
            $table->string('msisdn', 12);
            $table->text('content')->nullable();
            $table->string('sender_id', 12)->nullable();
            $table->string('status', 50)->nullable();
            $table->dateTime('received_at')->default('0000-00-00 00:00:00');
            $table->dateTime('updated_at')->default('0000-00-00 00:00:00');
            
            $table->index(['user_id', 'received_at'], 'midx_transaction_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
}
