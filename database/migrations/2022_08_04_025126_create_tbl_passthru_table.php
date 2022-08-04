<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPassthruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_passthru', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id');
            $table->tinyInteger('connection_id')->nullable()->comment("1 Globelabs ; 2 Chikka");
            $table->boolean('has_auto_reply')->default(0);
            $table->string('mo_api')->nullable();
            $table->string('call_type')->nullable();
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
        Schema::dropIfExists('tbl_passthru');
    }
}
