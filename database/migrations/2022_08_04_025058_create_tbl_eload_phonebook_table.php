<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEloadPhonebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eload_phonebook', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->mediumInteger('user_id')->default(0);
            $table->string('name', 50)->default('');
            $table->bigInteger('msisdn')->default(0);
            $table->integer('campaign_id')->default(0);
            $table->integer('load_limit')->default(0);
            $table->integer('limit_request')->default(0);
            $table->integer('limit_frequency')->default(0)->comment(" 0 = none, 1 = daily, 2 = weekly, 3 = monthly, 4 = yearly");
            $table->integer('group_id')->default(0);
            $table->boolean('status_flag')->default(1)->index('idx_status_flag')->comment("1 = active, 0 = deleted");
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
        Schema::dropIfExists('tbl_eload_phonebook');
    }
}
