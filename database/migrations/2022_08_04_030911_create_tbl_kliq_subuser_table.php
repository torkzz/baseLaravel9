<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqSubuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_subuser', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('pin')->nullable();
            $table->mediumInteger('user_id')->nullable();
            $table->tinyInteger('user_role')->nullable();
            $table->string('role', 50);
            $table->string('user_module')->nullable();
            $table->time('window_start')->nullable();
            $table->time('window_end')->nullable();
            $table->boolean('privilege_id')->default(0)->comment("0: None; 1: Broadcast Only; 2: Reports Only; 3: All");
            $table->string('remember_token', 100)->default('');
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('password_auto_gen')->default(0);
            $table->string('msisdn', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_subuser');
    }
}
