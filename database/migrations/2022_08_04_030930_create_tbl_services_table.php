<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_services', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedInteger('service_type_id')->index('fk_service_type_id');
            $table->unsignedInteger('service_status_id')->index('fk_service_status_id');
            $table->string('service_name', 50);
            $table->text('service_description');
            $table->timestamp('start_datetime')->default('0000-00-00 00:00:00');
            $table->timestamp('end_datetime')->default('0000-00-00 00:00:00');
            $table->boolean('is_trial_service')->default(0);
            $table->mediumInteger('access_code_id');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->unsignedTinyInteger('status_flag')->default(1);
            
            $table->unique(['service_type_id', 'service_status_id', 'service_name', 'is_trial_service'], 'midx_uniq_tbl_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_services');
    }
}
