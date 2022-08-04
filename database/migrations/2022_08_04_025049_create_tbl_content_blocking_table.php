<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblContentBlockingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_content_blocking', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('content', 100)->default('');
            $table->integer('user_id')->default(0);
            $table->boolean('status_flag')->default(0);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['content', 'user_id'], 'idx_user_content');
            $table->index(['user_id', 'status_flag'], 'idx_user_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_content_blocking');
    }
}
