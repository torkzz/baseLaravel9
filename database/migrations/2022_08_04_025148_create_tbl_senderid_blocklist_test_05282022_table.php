<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSenderidBlocklistTest05282022Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_senderid_blocklist_test_05282022', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->string('keyword', 20)->nullable();
            $table->integer('telco_id')->default(0)->comment("0:ALL;1:Globe;2:Smart");
            $table->integer('connection_id')->default(0)->comment("0:ALL;Gateway");
            $table->boolean('status_flag')->default(1)->comment("1:Active;2:Inactive");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['keyword', 'user_id', 'connection_id', 'telco_id'], 'uniq_idx_keyword_user');
            $table->index(['user_id', 'keyword', 'status_flag'], 'idx_keyword_user');
            $table->index(['user_id', 'telco_id', 'connection_id', 'keyword'], 'idx_user_block');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_senderid_blocklist_test_05282022');
    }
}
