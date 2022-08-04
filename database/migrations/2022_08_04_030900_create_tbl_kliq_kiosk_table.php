<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqKioskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_kiosk', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('group_id');
            $table->string('kiosk_pin');
            $table->string('kiosk_url', 32);
            $table->string('kiosk_logo');
            $table->integer('user_id');
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('created_by')->default(0);
            
            $table->unique(['kiosk_pin', 'kiosk_url'], 'idx_tbl_kliq_kiosk_kiosk_pin_kiosk_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_kiosk');
    }
}
