<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSoaAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_soa_adjustments', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->default(0);
            $table->boolean('type')->default(0);
            $table->integer('billing_id')->default(0);
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->integer('month')->default(0);
            $table->string('remarks', 150)->default('');
            $table->boolean('status_flag')->default(1)->comment("1:Active;0:Inactive");
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
        Schema::dropIfExists('tbl_soa_adjustments');
    }
}
