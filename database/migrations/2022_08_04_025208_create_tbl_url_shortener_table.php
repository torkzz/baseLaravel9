<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUrlShortenerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_url_shortener', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->text('long_url');
            $table->string('code', 10)->default('')->unique('code');
            $table->string('name', 50)->default('');
            $table->integer('clicks')->default(0);
            $table->boolean('status_flag')->default(1)->comment("0 = Soft Delete; 1 = Active; 2 = Inactive");
            $table->integer('created_by')->default(0);
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
        Schema::dropIfExists('tbl_url_shortener');
    }
}
