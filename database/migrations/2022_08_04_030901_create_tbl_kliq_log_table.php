<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kliq_id');
            $table->bigInteger('msisdn');
            $table->string('trans_id', 150);
            $table->string('type', 10);
            $table->tinyInteger('telco_id')->comment("1: GLOBE; 2: SMART; 3: SUN");
            $table->integer('msg_part')->default(0);
            $table->boolean('status_flag')->default(1);
            $table->text('status_message')->nullable();
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
        Schema::dropIfExists('tbl_kliq_log');
    }
}
