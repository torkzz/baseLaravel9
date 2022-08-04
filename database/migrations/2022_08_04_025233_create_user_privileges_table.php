<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_privileges', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedInteger('user_id');
            $table->unsignedMediumInteger('access_id');
            $table->smallInteger('additional_subclient_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_privileges');
    }
}
