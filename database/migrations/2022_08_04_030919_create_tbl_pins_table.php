<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pins', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('pin_name', 50);
            $table->string('pin_keyword', 50);
            $table->string('pin_secondary_keyword', 50);
            $table->mediumInteger('campaign_id');
            $table->mediumInteger('user_id');
            $table->unsignedInteger('lifetime')->default(0);
            $table->boolean('status_flag')->default(1);
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
        Schema::dropIfExists('tbl_pins');
    }
}
