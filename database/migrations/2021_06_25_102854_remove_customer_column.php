<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCustomerColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('person_name');
            $table->dropColumn('city');
            $table->dropColumn('address2');
            $table->dropColumn('fax');
            $table->dropColumn('gstin_pan');
            $table->string('pan',32);
            $table->string('gstin',64);
            $table->enum('same_shipping',['on', 'off'])->default('on');
            $table->dropColumn('website');
            $table->dropColumn('email');
            $table->dropColumn('eway_distance');
            $table->dropColumn('license_no');
            $table->dropColumn('due_days');
            $table->dropColumn('bank_name');
            $table->dropColumn('bank_ifsc');
            $table->dropColumn('bank_account_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('person_name',255);
            $table->string('city',64);
            $table->text('address2');
            $table->string('fax',128);
            $table->string('gstin_pan',255);
            $table->dropColumn('pan');
            $table->dropColumn('gstin');
            $table->string('website',255);
            $table->string('email',255);
            $table->string('eway_distance',255);
            $table->string('license_no',255);
            $table->string('due_days',12);
            $table->string('bank_name',255);
            $table->string('bank_ifsc',255);
            $table->string('bank_account_number',255);
        });
    }
}
