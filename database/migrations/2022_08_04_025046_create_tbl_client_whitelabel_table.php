<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClientWhitelabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_client_whitelabel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->string('domain', 50)->default('');
            $table->string('logo_url')->default('');
            $table->boolean('about_us')->default(1)->comment("1 - display, 0 - hide");
            $table->string('tnc_link')->default('');
            $table->string('dpa_link')->default('');
            $table->boolean('status_flag')->default(1)->comment("0 - delete, 1 - active,  2 - inactive");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_client_whitelabel');
    }
}
