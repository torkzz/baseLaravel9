<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_template', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->double('user_id')->default(0);
            $table->string('name', 120)->nullable();
            $table->string('message', 4500)->nullable();
            $table->double('created_by')->nullable();
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_template');
    }
}
