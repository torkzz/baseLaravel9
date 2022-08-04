<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_queue', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('user_id');
            $table->mediumInteger('campaign_id');
            $table->integer('sender_id')->default(0);
            $table->string('b_name', 70);
            $table->string('b_keyword', 30);
            $table->string('b_secondary_keyword', 30);
            $table->string('b_email', 50);
            $table->string('support_msisdn', 20)->nullable();
            $table->string('support_email', 50)->nullable();
            $table->unsignedSmallInteger('opening_time');
            $table->unsignedSmallInteger('closing_time');
            $table->string('operation_day', 70);
            $table->string('pin', 10);
            $table->text('branch_url');
            $table->text('kiosk_url')->nullable();
            $table->text('categories');
            $table->integer('category_id')->default(0);
            $table->text('banner_content');
            $table->boolean('banner_visibility')->default(0);
            $table->integer('cust_name_visibility')->default(0);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_queue');
    }
}
