<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('no_itc');
            $table->dropColumn('cgst');
            $table->dropColumn('sgst');
            $table->dropColumn('igst');
            $table->dropColumn('cess');
            $table->dropColumn('cess_amount');
            $table->dropColumn('is_service_product');
            $table->enum('category', ['taxable','exempted','non_gst'])->default('taxable');
            $table->string('gst_rate',255);
            $table->string('item_code',255);
            $table->enum('product_type', ['product','service'])->default('product');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('type', ['taxable', 'nill_rated','exempted','non_gst'])->default('taxable');
            $table->tinyInteger('no_itc')->default(1);
            $table->integer('cgst')->default(0);
            $table->integer('sgst')->default(0);
            $table->integer('igst')->default(0);
            $table->integer('cess')->default(0);
            $table->decimal('cess_amount', 8,  2);
            $table->tinyInteger('is_service_product')->default(0);
            $table->dropColumn('category');
            $table->dropColumn('gst_rate');
            $table->dropColumn('item_code');
            $table->dropColumn('product_type');
        });
    }
}
