<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserMicroservicePrivilegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_microservice_privilege', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('user_id');
            $table->mediumInteger('service_type_id');
            $table->boolean('reach_ad_flag')->default(0)->comment("1: Active; 0: Inactive;");
            $table->text('blacklist_notes')->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->unsignedTinyInteger('status_flag')->default(1);
            
            $table->index(['user_id', 'service_type_id', 'reach_ad_flag'], 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_microservice_privilege');
    }
}
