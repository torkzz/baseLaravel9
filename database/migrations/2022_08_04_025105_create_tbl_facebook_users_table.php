<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFacebookUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_facebook_users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id');
            $table->string('facebook_id', 50);
            $table->string('name', 50)->default('');
            $table->string('fname', 50)->default('');
            $table->string('lname', 50)->default('');
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('status_flag')->default(1);
            
            $table->unique(['account_id', 'facebook_id'], 'account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_facebook_users');
    }
}
