<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberSenderidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_senderid', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->string('name', 50)->default('');
            $table->string('description', 100)->default('');
            $table->boolean('connection_id')->default(0);
            $table->string('app_key', 300)->default('');
            $table->string('app_secret', 300)->default('');
            $table->string('mo_url', 100)->default('');
            $table->string('dlr_url', 100)->default('');
            $table->string('dlr_method', 10)->default('');
            $table->string('mo_method', 10)->default('');
            $table->boolean('is_default')->default(0);
            $table->boolean('status_flag')->default(1);
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
        Schema::dropIfExists('tbl_viber_senderid');
    }
}
