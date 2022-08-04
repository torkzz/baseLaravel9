<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqOptoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_optout', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->string('msisdn', 13)->default('0');
            $table->boolean('status_flag')->default(1)->index('status_flag');
            $table->boolean('optout_type')->default(1)->comment("1 - via text, 2 - via link");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            
            $table->index(['user_id', 'status_flag'], 'user_id');
            $table->index(['msisdn', 'user_id'], 'idx_msisdn_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_optout');
    }
}
