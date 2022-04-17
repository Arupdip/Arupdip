<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempusers', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('full_name');
            $table->string('fathers_name');
            $table->string('date_of_birth');
            $table->string('age');
            $table->string('district');
            $table->string('pincode')->nullable();
            $table->string('state');
            $table->string('mandal')->nullable();
            $table->string('address');
            $table->string('name_in_power_attorney');
            $table->string('mob_no');
            $table->string('alternate_mob_no')->nullable();
            $table->string('aadhar_no');
            $table->string('pan_no');
            $table->string('type_of_firm')->nullable();
            $table->string('state_of_firm')->nullable();
            $table->string('firm_plan_no')->nullable();
            $table->string('firm_name')->nullable();
            $table->string('district_of_firm')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('firm_pincode')->nullable();
            $table->string('amc_name')->nullable();
            $table->string('firm_address')->nullable();
            $table->binary('uploaded_pan')->nullable();
            $table->binary('uploaded_firm_pan')->nullable();
            $table->binary('uploaded_gst')->nullable();
            $table->binary('declaration_solvency')->nullable();
            $table->binary('bank_guarantee_copy')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_ifsc_code')->nullable();
            $table->binary('uploaded_bank_passbook')->nullable();
            $table->string('is_minor')->nullable();
            $table->string('market_name')->nullable();
            $table->string('liscence_type')->nullable();
            $table->string('name_of_power_of_atonomy')->nullable();
            $table->string('payment_status')->nullable();;
            $table->string('payment_token')->nullable();;
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
        Schema::dropIfExists('tempusers');
    }
}
