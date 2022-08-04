<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaymongoLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_paymongo_logs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('billing_id');
            $table->string('event', 50)->default('');
            $table->integer('user_id')->default(0);
            $table->string('request_id', 15)->default('');
            $table->string('response_id', 35)->default('');
            $table->text('request')->nullable();
            $table->text('response')->nullable();
            $table->boolean('status_flag')->default(1);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_paymongo_logs');
    }
}
