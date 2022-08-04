<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEloadKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eload_keywords', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('campaign_id')->default(0);
            $table->text('description')->nullable()->comment("This is the description of the campaign for the sku");
            $table->string('keyword', 30)->default('');
            $table->integer('sku_id')->default(0)->comment("from tbl_eload_skus.id");
            $table->boolean('status_flag')->default(1)->comment("Comment: 1 = active, 0 = deleted");
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
        Schema::dropIfExists('tbl_eload_keywords');
    }
}
