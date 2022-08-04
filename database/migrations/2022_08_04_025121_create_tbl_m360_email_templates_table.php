<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblM360EmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_m360_email_templates', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->tinyInteger('email_type')->nullable();
            $table->text('email_cc')->nullable();
            $table->text('email_bcc')->nullable();
            $table->text('email_subject')->nullable();
            $table->string('content_title', 100)->nullable();
            $table->string('content_subtitle', 150)->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('status_flag')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_m360_email_templates');
    }
}
