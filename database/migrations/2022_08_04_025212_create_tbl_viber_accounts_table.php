<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_accounts', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('client_id');
            $table->string('name', 100);
            $table->string('token', 100);
            $table->string('viber_id', 50);
            $table->string('timestamp', 14)->default('');
            $table->string('chat_hostname', 15)->default('');
            $table->string('message_token', 20)->default('');
            $table->string('json_data');
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
        Schema::dropIfExists('tbl_viber_accounts');
    }
}
