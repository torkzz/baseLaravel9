<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kliq_id');
            $table->integer('group_id');
            $table->integer('phonebook_id');
            $table->bigInteger('msisdn');
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->integer('phonebook_count')->default(1);
            $table->string('name')->default('');
            
            $table->index(['msisdn', 'name'], 'idx_msisdn_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_recipients');
    }
}
