<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblViberBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_viber_bots', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id');
            $table->integer('user_id');
            $table->mediumText('message');
            $table->string('keyword', 30)->default('');
            $table->string('sender', 30)->default('');
            $table->mediumText('picture');
            $table->string('cta_label', 50)->default('');
            $table->string('cta_link', 50)->default('');
            $table->dateTime('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('status_flag')->default(1);
            $table->boolean('type')->default(1);
            
            $table->unique(['account_id', 'keyword'], 'uniq_viber_bots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_viber_bots');
    }
}
