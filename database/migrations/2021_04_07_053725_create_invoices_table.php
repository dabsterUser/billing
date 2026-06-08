<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('customer_vendor_id');
            $table->string('invoice_type',128);
            $table->string('invoice_prefix',128)->default('');
            $table->string('invoice_postfix',128)->default('');
            $table->string('invoice_number',128);
            $table->date('bill_date')->nullable();;
            $table->string('challan_no',255);
            $table->date('challan_date')->nullable();
            $table->string('order_no',255);
            $table->date('order_no_date')->nullable();;
            $table->string('lrno',255);
            $table->string('eway',255);
            $table->date('due_date');
            $table->string('bank',255);
            $table->string('payment_type',255);
            $table->text('document_note');
            $table->text('payment_note');
            $table->text('bank_term_condition');
            $table->integer('total_qty');
            $table->decimal('total_price', 8,  2);
            $table->decimal('total_discount', 8,  2);
            $table->decimal('total_cgst_rate', 8,  2);
            $table->decimal('total_sgst_rate', 8,  2);
            $table->decimal('total_igst_rate', 8,  2);
            $table->decimal('total_cess_rate', 8,  2);
            $table->decimal('item_total', 8,  2);
            $table->decimal('total_taxable', 8,  2);
            $table->decimal('total_tax', 8,  2);
            $table->enum('other_tax_type_minus', ['1', '0'])->default('1');
            $table->enum('other_tax_in_rupee', ['1', '0'])->default('1');
            $table->decimal('other_tax_value', 8,  2);
            $table->decimal('other_tax_amount', 8,  2);
            $table->enum('total_discount_type_minus', ['1', '0'])->default('1');
            $table->enum('total_discount_in_rupee', ['1', '0'])->default('1');
            $table->decimal('total_discount_value', 8,  2);
            $table->decimal('total_discount_amount', 8,  2);
            $table->decimal('payment_received', 8,  2);
            $table->string('sale_receipt_amount', 180)->default('');
            $table->string('sale_receipt_id',180)->default('');
            $table->decimal('hidden_round_off_value', 8,  2);
            $table->string('hidden_grandtotalwords', 164);
            $table->enum('type', ['sale', 'purchase'])->default('sale');
            $table->decimal('grand_total',8,2);
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
        Schema::dropIfExists('invoices');
    }
}
