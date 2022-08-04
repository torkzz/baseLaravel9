<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQueueCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_queue_counter', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('b_id');
            $table->string('c_name', 70);
            $table->tinyInteger('c_status');
            $table->unsignedTinyInteger('c_service_type')->default(1);
            $table->integer('c_number')->nullable();
            $table->string('pin', 10);
            $table->string('categories')->default('[]');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->foreign('b_id', 'FK_tbl_q_counter_b_id')->references('id')->on('tbl_queue')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_queue_counter');
    }
}
