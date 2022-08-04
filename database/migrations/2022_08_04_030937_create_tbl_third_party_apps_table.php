<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblThirdPartyAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_third_party_apps', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->integer('user_id');
            $table->mediumInteger('shortcode_id')->nullable();
            $table->string('app_id', 100);
            $table->string('app_secret', 100);
            $table->string('passphrase', 50);
            $table->string('globe_access_code', 10);
            $table->string('nonglobe_access_code', 11);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->index(['user_id', 'app_id', 'app_secret', 'passphrase', 'globe_access_code', 'nonglobe_access_code'], 'idx_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_third_party_apps');
    }
}
