<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAmberMigrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_amber_migration', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id');
            $table->integer('user_id')->default(0);
            $table->string('email', 50)->default('');
            $table->integer('access_code')->default(0);
            $table->boolean('for_migration')->default(0);
            $table->boolean('status_flag')->default(1);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_amber_migration');
    }
}
