<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDiyPlansTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_diy_plans_test', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 100)->nullable();
            $table->string('description', 250)->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('sub_type')->nullable();
            $table->string('amount', 10)->nullable();
            $table->string('consumable_sms', 10)->nullable();
            $table->integer('sms_threshold')->default(0);
            $table->integer('free_sms')->default(0);
            $table->string('rate_per_sms', 10)->nullable();
            $table->integer('senderid_qty')->nullable();
            $table->tinyInteger('reports')->nullable();
            $table->tinyInteger('support')->nullable();
            $table->tinyInteger('phonebook')->nullable();
            $table->tinyInteger('phonebook_groups')->nullable();
            $table->tinyInteger('broadcast')->nullable();
            $table->tinyInteger('two_way')->nullable();
            $table->tinyInteger('polls')->nullable();
            $table->tinyInteger('kiosk')->nullable();
            $table->integer('main_account_qty')->nullable();
            $table->integer('sub_user_qty')->nullable();
            $table->integer('expiration_in_days')->nullable();
            $table->integer('min_contract_days')->nullable();
            $table->tinyInteger('rich_media')->nullable();
            $table->integer('fb_page')->default(0);
            $table->integer('viber_bot')->default(0);
            $table->tinyInteger('status_flag')->nullable();
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
        Schema::dropIfExists('tbl_diy_plans_test');
    }
}
