<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEloadTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eload_transactions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('eload_campaign_id')->default(0)->comment("from tbl_eload_keywords.id");
            $table->integer('eload_phonebook_id')->default(0)->comment("from tbl_eload_phonebook.id");
            $table->double('amount')->default(0);
            $table->date('date')->default('0000-00-00');
            $table->string('transid', 200)->default('');
            $table->boolean('status_flag')->default(1)->comment("0 = deleted, 1 = active/success");
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
        Schema::dropIfExists('tbl_eload_transactions');
    }
}
