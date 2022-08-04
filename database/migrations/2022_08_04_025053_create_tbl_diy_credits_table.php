<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDiyCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_diy_credits', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->nullable()->index('idx_user_id');
            $table->smallInteger('plan_id')->default(0);
            $table->tinyInteger('credit_type')->nullable();
            $table->integer('credits')->default(0);
            $table->integer('credits_mt')->default(0);
            $table->integer('credits_mo')->default(0);
            $table->integer('consumed_credits')->default(0);
            $table->integer('consumed_credits_mt')->default(0);
            $table->integer('consumed_credits_mo')->default(0);
            $table->integer('expired_credits')->default(0);
            $table->date('expiration_date')->nullable();
            $table->boolean('consumption_notif')->default(0);
            $table->tinyInteger('status_flag')->nullable();
            $table->decimal('sms_threshold', 15, 4)->default(0.0000);
            $table->integer('credits_viber')->default(0);
            $table->integer('credits_mt_viber')->default(0);
            $table->integer('credits_mo_viber')->default(0);
            $table->integer('consumed_credits_viber')->default(0);
            $table->integer('consumed_credits_mt_viber')->default(0);
            $table->integer('consumed_credits_mo_viber')->default(0);
            $table->decimal('viber_threshold', 15, 4)->default(0.0000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_diy_credits');
    }
}
