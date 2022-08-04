<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->text('permissions')->nullable();
            $table->string('api_password');
            $table->boolean('activated_diy')->default(0);
            $table->boolean('activated_http_api')->default(0);
            $table->boolean('activated_smpp')->default(0);
            $table->boolean('activated')->default(1);
            $table->string('activation_code')->nullable()->index('users_activation_code_index');
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('persist_code')->nullable();
            $table->string('reset_password_code')->nullable()->index('users_reset_password_code_index');
            $table->double('credit')->default(0);
            $table->timestamps();
            $table->string('username')->nullable();
            $table->char('first_login', 1)->default('N');
            $table->boolean('is_hsms')->default(0);
            $table->boolean('is_trial')->default(0)->comment("0 for paid 1 for free");
            $table->boolean('is_locked')->default(0)->comment("0 for unlock;1 for softlock;2 for hardlock");
            $table->boolean('attempts')->default(0);
            $table->dateTime('softlock_date')->default('1970-01-01 00:00:00');
            $table->dateTime('hardlock_date')->default('1970-01-01 00:00:00');
            $table->dateTime('password_date')->default('0000-00-00 00:00:00');
            $table->boolean('password_auto_gen')->default(0)->comment("0 for yes;1 for no");
            $table->boolean('from_web')->default(0);
            $table->rememberToken();
            $table->integer('mo_credits')->default(0);
            $table->integer('mt_credits')->default(0);
            $table->integer('mt_cap')->default(0);
            $table->integer('group_id')->default(0);
            $table->integer('default_sender_id')->default(0);
            $table->boolean('broadcast_flag')->default(1);
            $table->boolean('bu_id')->default(0);
            $table->boolean('2fa_flag')->default(0);
            $table->boolean('log_flag')->default(0);
            $table->text('auto_reply')->nullable();
            $table->boolean('otp_attempt')->default(0);
            $table->boolean('auto_charge_flag')->default(0)->comment("0:NO;1:YES");
            $table->boolean('is_verified')->default(0)->comment("0 - NOT VERIFIED , 1: OTP VERIFIED , 2 : EMAIL VERIFIED");
            $table->integer('referral_id')->default(0);
            $table->unsignedTinyInteger('tax_type')->default(1)->comment("1:vatable; 2:zero rated; 3:exempt");
            $table->smallInteger('class_id')->default(0)->comment("1 = Micro, 2 = Small, 3 = Medium, 4 = Large");
            $table->mediumInteger('sub_class_id')->default(0);
            $table->smallInteger('source_id')->default(0)->comment("1 = Organic, 2 = PPC, 3 = Direct, 4 = Referral");
            $table->mediumInteger('industry_id')->default(0);
            $table->smallInteger('dlrmask')->default(26);
            $table->boolean('status_flag')->default(1)->comment("0:Deleted, 1:Existing");
            
            $table->unique(['username', 'email'], 'uniq_index');
            $table->index(['bu_id', 'status_flag'], 'idx_bu_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
