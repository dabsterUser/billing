<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('customer_vendor_id');
            $table->integer('receipt_no');
            $table->text('address');
            $table->string('gstin_pan',164);
            $table->date('payment_date');
            $table->enum('payment_option', ['1', '2'])->default('1');
            $table->string('payment_type', 168);
            $table->string('invoice_no', 255);
            $table->string('invoice_amount', 255);
            $table->decimal('amount', 8,2);
            $table->decimal('advanced_amount', 8,2);
            $table->text('payment_note');
            $table->enum('type', ['sale', 'purchase'])->default('sale');
            $table->enum('status', ['active', 'inactive','cancel'])->default('active');
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
        Schema::dropIfExists('payment_receipts');
    }
}
