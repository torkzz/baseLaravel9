<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_group', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->nullable();
            $table->string('name', 64)->nullable();
            $table->string('description')->nullable();
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_group');
    }
}
