<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqGroupsTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_groups_test', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('group_name', 50);
            $table->text('variable_header')->nullable();
            $table->boolean('is_uploading')->default(0);
            $table->tinyInteger('status_flag');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->integer('created_by')->default(0);
            $table->integer('phonebook_count')->default(0);
            $table->integer('subscription_flag')->default(0);
            $table->integer('unique_flag')->default(0);
            $table->string('type', 50)->default('["1"]');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_groups_test');
    }
}
