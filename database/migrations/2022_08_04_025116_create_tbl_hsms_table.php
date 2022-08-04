<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHsmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hsms', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->integer('account_id')->default(0);
            $table->string('campaign_name', 50)->default('');
            $table->text('monitoring_list');
            $table->integer('sender_id')->default(0);
            $table->text('criteria');
            $table->string('match_type', 10)->default('match_all');
            $table->text('url');
            $table->string('file_path')->default('');
            $table->integer('base_count')->default(0);
            $table->boolean('status_flag')->default(1)->comment("1 - profiling; 2 - content preparation; 3 - Broadcast in Progress; 4 - Reporting; 5 - Invoicing; 6 - Closed; 7 - Cancelled");
            $table->integer('created_by')->default(0);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->integer('updated_by')->default(0);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_hsms');
    }
}
