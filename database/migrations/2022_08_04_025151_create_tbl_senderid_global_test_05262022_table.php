<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSenderidGlobalTest05262022Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_senderid_global_test_05262022', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('keyword', 20)->index('indx_keyword');
            $table->boolean('telco_id')->default(0);
            $table->boolean('status_flag')->default(0)->comment("0:Deactive| 1:Active");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->unique(['keyword', 'telco_id', 'status_flag'], 'uidx_keyword_telcoid_statusflag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_senderid_global_test_05262022');
    }
}
