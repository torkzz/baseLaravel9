<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTallyOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tally_options', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('tally_id')->index('idx_tally_id');
            $table->string('option_name', 50);
            $table->string('option_keyword', 50);
            $table->string('option_color', 10);
            $table->integer('vote_counter')->default(0);
            $table->tinyInteger('status_flag')->nullable();
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
        Schema::dropIfExists('tbl_tally_options');
    }
}
