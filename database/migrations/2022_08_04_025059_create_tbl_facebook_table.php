<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFacebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_facebook', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook_campaign_name', 30)->default('');
            $table->mediumInteger('campaign_id');
            $table->integer('user_id');
            $table->string('subject', 100)->nullable();
            $table->text('message');
            $table->integer('sender_id');
            $table->string('sender_id_name', 25)->default('');
            $table->timestamp('scheduled_at')->default('0000-00-00 00:00:00');
            $table->boolean('broadcast_type')->default(0)->comment("0: NORMAL; 1: RECURRING");
            $table->tinyInteger('frequency')->nullable()->comment("1: DAILY; 2: WEEKLY; 3: MONTHLY");
            $table->enum('day', ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'])->nullable();
            $table->unsignedTinyInteger('date')->nullable();
            $table->boolean('send_unique')->default(0);
            $table->integer('campaign_type')->default(0);
            $table->tinyInteger('status_flag')->nullable()->comment("1: ONGOING; 2: SCHED; 3: COMPLETED; 0: FAILED/CANCELLED");
            $table->integer('created_by');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->string('optout_footer', 100)->nullable();
            $table->text('cta_link');
            $table->string('cta_label', 100)->nullable();
            $table->text('cta_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_facebook');
    }
}
