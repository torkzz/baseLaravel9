<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEcpayLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ecpay_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('billing_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->text('request_id');
            $table->boolean('biller_type')->default(0);
            $table->text('json_data');
            $table->text('json_resp');
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
        Schema::dropIfExists('tbl_ecpay_logs');
    }
}
