<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('api_key_id');
            $table->string('route', 150)->index('api_logs_route_index');
            $table->string('method', 6)->index('api_logs_method_index');
            $table->text('params');
            $table->string('ip_address');
            $table->timestamps();
            
            $table->foreign('api_key_id', 'api_logs_api_key_id_foreign')->references('id')->on('api_keys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_logs');
    }
}
