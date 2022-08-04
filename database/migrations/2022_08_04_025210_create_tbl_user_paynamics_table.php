<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserPaynamicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_paynamics', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0)->comment("From user");
            $table->string('orig_trxid', 100)->default('');
            $table->string('token', 100)->default('');
            $table->text('user_details');
            $table->string('transid', 50)->default('');
            $table->string('card_info', 20)->default('');
            $table->boolean('status_flag')->default(1)->comment("1-Actve:2-Inactive");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->integer('gateway_id')->default(1)->comment("from: tbl_payments_gateways");
            $table->boolean('is_default')->default(0)->comment("1:YES;0:NO");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_paynamics');
    }
}
