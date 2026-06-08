<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnInvoiceItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn('hidden_item_product_cgst');
            $table->dropColumn('hidden_item_product_sgst');
            $table->dropColumn('hidden_item_product_igst');
            $table->dropColumn('hidden_item_product_cess');
            $table->dropColumn('hidden_item_product_cess_amount');
            $table->dropColumn('cgst');
            $table->dropColumn('cgst_rate');
            $table->dropColumn('sgst');
            $table->dropColumn('sgst_rate');
            $table->dropColumn('igst');
            $table->dropColumn('igst_rate');
            $table->dropColumn('cess_amount');
            $table->string('hidden_item_product_gst',128);
            $table->decimal('gst', 8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->string('hidden_item_product_cgst',128);
            $table->string('hidden_item_product_sgst',128);
            $table->string('hidden_item_product_igst',128);
            $table->string('hidden_item_product_cess',128);
            $table->string('hidden_item_product_cess_amount',128);
            $table->decimal('cgst',8,2);
            $table->decimal('cgst_rate',8,2);
            $table->decimal('sgst',8,2);
            $table->decimal('sgst_rate',8,2);
            $table->decimal('igst',8,2);
            $table->decimal('igst_rate',8,2);
            $table->decimal('cess_amount',8,2);
            $table->dropColumn('hidden_item_product_gst');
            $table->dropColumn('gst');
        });
    }
}
