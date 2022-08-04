<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_accounts', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('type_id')->default(0)->comment("1: Administrator | 2: Business Unit | 3:Operations | 4: Service Desk | 5: Finance | 6: Contents | 7: Load Client");
            $table->boolean('bu_id')->default(0);
            $table->string('firstname', 50);
            $table->string('middlename', 50);
            $table->string('lastname', 50);
            $table->string('email', 100)->unique('idx_uniq_email');
            $table->string('password', 100);
            $table->string('mobile', 20);
            $table->string('token', 100);
            $table->string('remember_token', 100);
            $table->dateTime('last_logged_in')->default('0000-00-00 00:00:00');
            $table->string('facebook_id', 50);
            $table->string('google_id', 50);
            $table->string('twitter_id', 50);
            $table->string('linkedin_id', 50);
            $table->string('yahoo_id', 50);
            $table->boolean('status_flag')->default(1)->comment("1: Active");
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            
            $table->index(['token', 'status_flag'], 'idx_tbl_account_token');
            $table->index(['id', 'remember_token'], 'idx_remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_accounts');
    }
}
