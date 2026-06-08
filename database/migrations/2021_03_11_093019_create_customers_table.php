<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name',255);
            $table->string('person_name',255);
            $table->string('phone',16);
            $table->string('country_code',6);
            $table->integer('state_id');
            $table->string('city',64);
            $table->bigInteger('pincode');
            $table->text('address1');
            $table->text('address2');
            $table->string('fax',128);
            $table->string('website',255);
            $table->string('email',255);
            $table->string('registration_type',255);
            $table->string('gstin_pan',255);
            $table->string('eway_distance',255);
            $table->string('license_no',255);
            $table->string('due_days',12);
            $table->string('bank_name',255);
            $table->string('bank_ifsc',255);
            $table->string('bank_account_number',255);
            $table->enum('type', ['customer', 'vendor','customer-vendor'])->default('customer');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
