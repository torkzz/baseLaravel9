<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQueueTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_queue_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('counter_id');
            $table->unsignedInteger('b_id');
            $table->integer('q_number');
            $table->text('comment');
            $table->integer('transaction_type');
            $table->text('transaction_details');
            $table->integer('category_id')->default(0);
            $table->time('serving_time')->comment("Actual time consumed");
            $table->dateTime('start_time')->default('0000-00-00 00:00:00');
            $table->dateTime('end_time')->default('0000-00-00 00:00:00');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(1);
            
            $table->foreign('b_id', 'FK_tbl_q_transactions_b_id')->references('id')->on('tbl_queue')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_queue_transactions');
    }
}
