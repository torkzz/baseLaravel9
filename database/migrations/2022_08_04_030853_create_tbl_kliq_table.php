<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kliq_name', 30);
            $table->mediumInteger('campaign_id');
            $table->integer('user_id');
            $table->text('message');
            $table->integer('sender_id');
            $table->string('sender_id_name', 25)->default('');
            $table->timestamp('scheduled_at')->default('0000-00-00 00:00:00');
            $table->boolean('broadcast_type')->default(0)->comment("0: NORMAL; 1: RECURRING");
            $table->tinyInteger('frequency')->nullable()->comment("1: DAILY; 2: WEEKLY; 3: MONTHLY");
            $table->enum('day', ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'])->nullable();
            $table->unsignedTinyInteger('date')->nullable();
            $table->boolean('status_flag')->default(1);
            $table->boolean('send_unique')->default(0);
            $table->integer('created_by');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->string('optout_footer', 100)->default('');
            $table->boolean('optout_type')->default(1)->comment("1 - via text, 2 - via link");
            $table->integer('total_base')->default(0);
            $table->integer('total_success')->default(0);
            $table->integer('total_failed')->default(0);
            $table->integer('total_success_txn')->default(0);
            
            $table->index(['status_flag', 'scheduled_at'], 'idx_stats_sched');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq');
    }
}
