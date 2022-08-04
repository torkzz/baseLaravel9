<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFacebookAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_facebook_accounts', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('client_id');
            $table->string('name', 100);
            $table->string('token', 250)->default('');
            $table->string('facebook_id', 50);
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('status_flag')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_facebook_accounts');
    }
}
