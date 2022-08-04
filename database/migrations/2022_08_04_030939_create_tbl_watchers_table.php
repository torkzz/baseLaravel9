<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWatchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_watchers', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('shortcode_id');
            $table->string('watcher_name', 100);
            $table->text('out_directory')->nullable();
            $table->text('logout_directory')->nullable();
            $table->text('logstatus_directory')->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(1);
            
            // $table->index(['shortcode_id', 'watcher_name', 'out_directory', 'logout_directory', 'logstatus_directory'], 'idx_watchers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_watchers');
    }
}
