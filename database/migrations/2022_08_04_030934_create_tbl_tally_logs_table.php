<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTallyLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tally_logs', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->mediumInteger('tally_id');
            $table->mediumInteger('tally_option_id');
            $table->bigInteger('msisdn')->nullable();
            $table->text('message')->nullable();
            $table->string('telco', 50)->nullable();
            $table->integer('telco_id')->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('status_flag')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tally_logs');
    }
}
