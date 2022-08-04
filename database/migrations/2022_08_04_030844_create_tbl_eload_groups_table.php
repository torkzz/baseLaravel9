<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEloadGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eload_groups', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->string('name', 150)->default('');
            $table->integer('limit_request')->default(0);
            $table->integer('limit_frequency')->default(0)->comment(" 0 = none, 1 = daily, 2 = weekly, 3 = monthly, 4 = yearly");
            $table->integer('limit_amount')->default(0);
            $table->boolean('status_flag')->default(1)->comment("1 = active, 0 = deleted");
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
        Schema::dropIfExists('tbl_eload_groups');
    }
}
