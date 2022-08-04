<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblReachVerticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reach_verticals', function (Blueprint $table) {
            $table->mediumIncrements('id')->index();
            $table->string('name', 20);
            $table->float('message_cost', 13, 2)->default(0.00);
            $table->text('description')->nullable();
            $table->mediumText('image')->nullable();
            $table->tinyInteger('status_flag');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('deleted_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_reach_verticals');
    }
}
