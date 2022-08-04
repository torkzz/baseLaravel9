<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEloadSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eload_skus', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->text('description')->nullable()->comment("This is the description of skus from globelabs");
            $table->string('sku', 50)->default('');
            $table->double('amount')->default(0);
            $table->boolean('status_flag')->default(1)->comment("1 = active, 0 = deleted");
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
        Schema::dropIfExists('tbl_eload_skus');
    }
}
