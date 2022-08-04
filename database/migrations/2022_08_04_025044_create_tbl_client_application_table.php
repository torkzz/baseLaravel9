<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClientApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_client_application', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->string('app_name', 64)->default('');
            $table->string('app_key', 100)->default('');
            $table->string('app_secret', 100)->default('');
            $table->string('passphrase', 100)->default('');
            $table->integer('ac_id')->default(0);
            $table->integer('globe_ac_id')->default(0);
            $table->boolean('is_bypass')->default(0);
            $table->integer('group_id')->default(0);
            $table->string('redirect_url')->default('');
            $table->string('notify_url')->default('');
            $table->string('webhook', 100)->default('');
            $table->integer('sender_id')->default(0);
            $table->boolean('status_flag')->default(1)->comment("0 - DELETED ; 1 - ACTIVE ; 2 - DEACTIVATED");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_client_application');
    }
}
