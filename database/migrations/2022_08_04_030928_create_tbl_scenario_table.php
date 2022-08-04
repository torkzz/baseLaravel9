<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblScenarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_scenario', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->integer('scenario_id')->default(0);
            $table->unsignedMediumInteger('service_type_id');
            $table->string('scenario_name', 50);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->tinyInteger('status_flag')->nullable();
            
            $table->index(['service_type_id', 'scenario_name', 'status_flag'], 'idx_scenario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_scenario');
    }
}
