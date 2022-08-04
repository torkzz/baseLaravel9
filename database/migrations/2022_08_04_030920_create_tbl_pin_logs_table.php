<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPinLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pin_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pin_id');
            $table->bigInteger('msisdn');
            $table->text('message');
            $table->string('type', 10);
            $table->string('trans_id', 150);
            $table->tinyInteger('telco_id')->comment("1: GLOBE; 2: SMART; 3: SUN");
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->foreign('pin_id', 'fk_tbl_pin_logs')->references('id')->on('tbl_pins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pin_logs');
    }
}
