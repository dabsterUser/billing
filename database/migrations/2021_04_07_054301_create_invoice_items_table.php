<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_id');
            $table->integer('product_id');
            $table->string('hsncode',128);
            $table->integer('hidden_item_product_id');
            $table->string('hidden_item_product_name',128);
            $table->string('hidden_item_product_uom',128);
            $table->string('hidden_item_product_is_transport',128);
            $table->string('hidden_item_product_cgst',128);
            $table->string('hidden_item_product_sgst',128);
            $table->string('hidden_item_product_igst',128);
            $table->string('hidden_item_product_cess',128);
            $table->string('hidden_item_product_cess_amount',128);
            $table->string('product_note',255);
            $table->integer('quantity');
            $table->decimal('price',8,2);
            $table->decimal('taxable_line_value',8,2);
            $table->decimal('discount',8,2);
            $table->decimal('cgst',8,2);
            $table->decimal('cgst_rate',8,2);
            $table->decimal('sgst',8,2);
            $table->decimal('sgst_rate',8,2);
            $table->decimal('igst',8,2);
            $table->decimal('igst_rate',8,2);
            $table->decimal('cess',8,2);
            $table->decimal('cessrate',8,2);
            $table->decimal('cess_amount',8,2);
            $table->decimal('total',8,2);
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
        Schema::dropIfExists('invoice_items');
    }
}
