<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaymentTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_transaction', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('transid', 50)->default('0');
            $table->unsignedMediumInteger('user_id')->default(0);
            $table->unsignedMediumInteger('campaign_id')->default(0);
            $table->boolean('payment_method')->default(0)->comment("1 - Paynamics | 2 - Bank Transfer");
            $table->decimal('raw_amount', 13, 2)->default(0.00);
            $table->decimal('total_amount', 13, 2)->default(0.00);
            $table->string('or_number', 50)->default('0');
            $table->string('status_code', 20)->nullable();
            $table->string('status_message')->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment_transaction');
    }
}
