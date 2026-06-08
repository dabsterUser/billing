<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_id');
            $table->integer('user_id');
            $table->text('address');
            $table->string('phone',16);
            $table->string('business_state',128);
            $table->string('business_gstno',32);
            $table->string('customer_gstno',32);
            $table->enum('reverse_charge',['no','yes'])->default('no');
            $table->enum('is_same_shipping',['no','yes'])->default('yes');
            $table->string('shipping_name',128);
            $table->text('shipping_address');
            $table->string('shipping_phone',128);
            $table->integer('shipping_state');
            $table->string('shipping_country',128);
            $table->string('shipping_gstin',128);
            $table->integer('place_supply');
            $table->integer('transport_id');
            $table->string('tranport_name',255);
            $table->string('transport_transport_id',255);
            $table->string('transport_vehicle_no',255);
            $table->string('transport_id_label',255);
            $table->string('vehicle_no_label',255);
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
        Schema::dropIfExists('invoice_details');
    }
}
