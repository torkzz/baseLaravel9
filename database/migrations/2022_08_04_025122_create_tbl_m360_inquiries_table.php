<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblM360InquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_m360_inquiries', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('fullname', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->boolean('type')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_m360_inquiries');
    }
}
