<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqSubsDirectoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_subs_directory', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('group_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('campaign_id')->nullable();
            $table->string('keyword')->nullable();
            $table->string('secondary_keyword')->nullable();
            $table->string('opt_in')->nullable();
            $table->string('opt_out')->nullable();
            $table->tinyInteger('status_flag')->nullable();
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
        Schema::dropIfExists('tbl_kliq_subs_directory');
    }
}
