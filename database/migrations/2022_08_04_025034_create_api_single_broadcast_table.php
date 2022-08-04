<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiSingleBroadcastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_single_broadcast', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->index('idx_user_id');
            $table->integer('broadcaster_id');
            $table->integer('broadcast_type')->default(1)->comment("1 - Live, 2 - Test Broadcast 1 (Real Transaction), 3 - Test Broadcast 2 (False Transaction)");
            $table->integer('send_limit')->default(0);
            $table->string('dlr_url')->nullable();
            $table->boolean('is_smpp')->default(0)->index('is_smpp')->comment("0 - HTTP, 1 - SMPP");
            $table->boolean('is_active')->default(1);
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->boolean('transmitter')->default(0);
            $table->boolean('transceiver')->default(0);
            $table->boolean('receiver')->default(0);
            $table->integer('default_sender_id')->default(0)->comment("0 if no default else keyword_id from wrp_keyword");
            $table->tinyInteger('max_concurrent_session')->default(10);
            $table->tinyInteger('window_size')->default(50);
            $table->boolean('dlr_setting')->default(0);
            $table->integer('transaction_limit')->default(0);
            $table->integer('transaction_remaining')->default(0);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
            $table->index(['username', 'is_active', 'is_smpp'], 'idxapi_single_broadcast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_single_broadcast');
    }
}
