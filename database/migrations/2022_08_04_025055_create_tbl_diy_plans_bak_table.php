<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDiyPlansBakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_diy_plans_bak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable()->unique('uniq_idx_name');
            $table->string('description', 250)->nullable()->comment("1 - FREE TRIAL, 2 - PREPAID, 3 - MONTHLY, 4 - ANNUAL");
            $table->tinyInteger('type')->nullable()->comment(" 2- prepaid, 3-monthly, 4-monthly");
            $table->tinyInteger('sub_type')->nullable()->comment("FOR PRICES PER PLAN, except for free trial");
            $table->string('amount', 10)->nullable();
            $table->string('consumable_sms', 10)->nullable();
            $table->integer('consumable_sms_mt')->default(0);
            $table->integer('consumable_sms_mo')->default(0);
            $table->integer('sms_threshold')->default(0);
            $table->integer('free_sms')->default(0);
            $table->string('rate_per_sms_mt', 10)->nullable();
            $table->decimal('rate_per_sms_mo', 10, 4)->default(0.0000);
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
            $table->string('code', 50)->default('')->unique('uniq_idx_code');
            $table->tinyInteger('status_flag')->nullable()->comment("1-ACTIVE,0-INACTVIE");
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
        Schema::dropIfExists('tbl_diy_plans_bak');
    }
}
