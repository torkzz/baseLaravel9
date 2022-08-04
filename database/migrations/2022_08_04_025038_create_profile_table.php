<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('');
            $table->string('billing_email_address', 50)->default('');
            $table->string('designation', 100)->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('company_address', 100);
            $table->string('company_website', 50)->default('');
            $table->string('passport', 100)->default('');
            $table->string('drivers_license', 100)->default('');
            $table->string('tin', 15)->default('');
            $table->string('bir_form', 300)->default(' ');
            $table->string('proof_of_billing', 300)->default('');
            $table->string('phone', 100)->nullable();
            $table->string('sec_reg_no')->nullable();
            $table->unsignedInteger('user_id')->index('idx_user_id');
            $table->unsignedInteger('account_type_id');
            $table->integer('plan_id')->default(0);
            $table->unsignedInteger('package_type_id');
            $table->integer('user_credit_rating_id')->default(0);
            $table->integer('package_id')->nullable();
            $table->unsignedInteger('profile_id_alias')->nullable();
            $table->date('contract_start_date')->default('0000-00-00');
            $table->date('contract_end_date')->default('0000-00-00');
            $table->date('lock_cancel_date')->nullable();
            $table->string('app_id', 500)->nullable();
            $table->string('app_secret', 500)->nullable();
            $table->string('access_code')->nullable();
            $table->string('access_code_xtelco')->nullable();
            $table->string('passphrase')->nullable();
            $table->decimal('rev_share', 13, 2)->default(30.00);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->useCurrent();
            $table->string('optout_keyword', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
