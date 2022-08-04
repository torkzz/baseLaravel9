<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPassthruAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_passthru_apps', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->index('idx_user_id');
            $table->string('app_id', 150);
            $table->string('app_secret', 150);
            $table->string('passphrase', 100)->nullable();
            $table->string('globe_access_code', 12);
            $table->string('nonglobe_access_code', 12);
            $table->integer('ac_id')->default(0);
            $table->timestamp('created_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_passthru_apps');
    }
}
