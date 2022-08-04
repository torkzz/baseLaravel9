<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_billing', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id');
            $table->string('name', 50);
            $table->string('email', 50);
            $table->decimal('billed_amount', 10, 2);
            $table->decimal('billed_payment', 10, 2);
            $table->string('billed_month', 7);
            $table->boolean('status_flag')->default(1)->comment("0 - SOFT DELETE ; 1 - PENDING ; 2 - SUCCESS ; 3 - OTHER ERRORS ; 4 - CANCELLED");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->decimal('billed_adjust', 10, 2)->default(0.00);
            $table->string('request_id', 50);
            $table->string('remarks', 500)->default('')->comment("failed");
            $table->mediumInteger('account_id')->default(0);
            $table->integer('plan_id')->default(0);
            $table->integer('gateway_id')->default(1)->comment("from: tbl_payments_gateways");
            $table->date('due_date')->default('0000-00-00');
            $table->decimal('vatable_sales', 10, 2)->default(0.00);
            $table->decimal('plan_amount', 10, 2)->default(0.00);
            $table->boolean('payment_method')->default(1)->comment("1-Credit Card:2-Over the Counter");
            $table->string('hash_code', 150)->default('');
            
            $table->unique(['user_id', 'request_id'], 'idx_tbl_user_payments_user_id_request_id');
            $table->index(['status_flag', 'user_id', 'plan_id'], 'idx_user_plan_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_billing');
    }
}
