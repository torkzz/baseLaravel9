<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_groups', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 50);
            $table->string('description')->default('');
            $table->enum('client_type', ['1', '2'])->default('1')->comment("1: Direct Client; 2: Aggregator");
            $table->tinyInteger('status_flag');
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
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
        Schema::dropIfExists('tbl_groups');
    }
}
