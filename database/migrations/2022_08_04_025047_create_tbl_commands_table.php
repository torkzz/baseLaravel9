<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_commands', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->text('command');
            $table->string('server_name', 60);
            $table->text('output');
            $table->boolean('status_flag')->default(1)->comment("0:Inactive, 1:Normal, 2:Execute");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            
            $table->index(['server_name', 'status_flag'], 'idx_server_status_flag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_commands');
    }
}
