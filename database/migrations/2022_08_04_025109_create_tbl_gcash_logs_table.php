<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGcashLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_gcash_logs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('billing_id')->default(0);
            $table->string('function', 150)->default('');
            $table->integer('user_id')->default(0);
            $table->text('request_id');
            $table->text('response_id');
            $table->text('json_data');
            $table->text('json_resp');
            $table->string('signature', 250)->default('');
            $table->boolean('payment_type')->default(1);
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
        Schema::dropIfExists('tbl_gcash_logs');
    }
}
