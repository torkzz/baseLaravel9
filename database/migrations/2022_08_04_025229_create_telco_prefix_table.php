<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelcoPrefixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telco_prefix', function (Blueprint $table) {
            $table->integer('prefix_id')->primary();
            $table->integer('telco_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('plan_type_id')->nullable();
            $table->string('prefix', 45)->nullable()->index('prefix');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telco_prefix');
    }
}
