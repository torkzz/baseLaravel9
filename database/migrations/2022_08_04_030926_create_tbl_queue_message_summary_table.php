<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQueueMessageSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_queue_message_summary', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('msisdn');
            $table->string('m_name', 70)->nullable();
            $table->text('message');
            $table->enum('message_type', ['mo', 'mt']);
            $table->unsignedInteger('transaction_id');
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            
            $table->foreign('transaction_id', 'FK_tbl_q_message_summary_transaction_id')->references('id')->on('tbl_queue_transactions')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_queue_message_summary');
    }
}
