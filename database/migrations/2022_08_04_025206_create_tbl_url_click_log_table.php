<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUrlClickLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_url_click_log', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('url_id')->default(0);
            $table->string('ip_address', 200)->default('');
            $table->string('device', 200)->default('');
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
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
        Schema::dropIfExists('tbl_url_click_log');
    }
}
