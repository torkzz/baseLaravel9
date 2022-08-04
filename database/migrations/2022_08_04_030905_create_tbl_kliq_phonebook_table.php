<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKliqPhonebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kliq_phonebook', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->bigInteger('msisdn');
            $table->text('variables')->nullable();
            $table->string('name')->default('');
            $table->string('email', 250)->default('');
            $table->integer('group_id')->index('idx_group_id');
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->integer('modified_by')->default(0);
            $table->integer('created_by')->default(0);
            $table->boolean('optout')->default(0);
            $table->boolean('telco_id')->default(0);
            $table->integer('is_subscription')->default(0);
            $table->text('remarks')->nullable();
            
            $table->index(['msisdn', 'group_id'], 'idx_msisid');
            $table->index(['user_id', 'msisdn'], 'tbl_kliq_phonebook_user_id_IDX');
            $table->index(['status_flag', 'group_id'], 'idx_group_status');
            $table->index(['msisdn', 'name'], 'idx_msisdn_name');
            $table->index(['updated_at', 'user_id', 'group_id'], 'idx_updated_user_group');
            $table->index(['updated_at', 'user_id', 'name', 'created_by', 'group_id'], 'idx_updated_user_name_created_group');
            // $table->index(['remarks'], 'idx_remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kliq_phonebook');
    }
}
