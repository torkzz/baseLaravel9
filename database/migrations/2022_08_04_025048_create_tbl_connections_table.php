<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_connections', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 100);
            $table->string('code', 15)->unique('idx_unique_tbl_connections');
            $table->boolean('type')->default(0);
            $table->unsignedTinyInteger('channel_id')->default(0)->comment("Mobile360.tbl_channels");
            $table->string('lookup_dir');
            $table->string('dump_dir')->nullable();
            $table->string('log_dir');
            $table->mediumInteger('tps')->default(0);
            $table->string('endpoint', 100)->default('');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->unsignedTinyInteger('status_flag')->default(1);
            $table->decimal('globe', 10, 4)->default(0.0000);
            $table->decimal('nglobe', 10, 4)->default(0.0000);
            $table->decimal('dito', 10, 4)->default(0.0000);
            $table->decimal('mo_fee', 10, 4)->default(0.0000);
            $table->decimal('mt_fee', 10, 4)->default(0.0000);
            $table->boolean('sms_flag')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_connections');
    }
}
