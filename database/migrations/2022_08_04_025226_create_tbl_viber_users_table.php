<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id')->default(0);
            $table->string('viber_id', 50)->default('');
            $table->string('name', 100)->default('');
            $table->string('language', 10)->default('');
            $table->string('country', 10)->default('');
            $table->string('api_version', 10)->default('');
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('status_flag')->default(1);
            
            $table->unique(['account_id', 'viber_id'], 'account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_viber_users');
    }
}
