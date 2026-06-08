<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name',255);
            $table->text('description');
            $table->string('hsn_code',255);
            $table->string('unit',255);
            $table->integer('stock');
            $table->enum('type', ['taxable', 'nill_rated','exempted','non_gst'])->default('taxable');
            $table->tinyInteger('no_itc')->default(1);
            $table->integer('cgst')->default(0);
            $table->integer('sgst')->default(0);
            $table->integer('igst')->default(0);
            $table->integer('cess')->default(0);
            $table->decimal('cess_amount', 8,  2);
            $table->decimal('sell_price', 8,  2);
            $table->decimal('sell_price_with_tax', 8,  2);
            $table->decimal('purchase_price', 8,  2);
            $table->decimal('purchase_price_with_tax', 8,  2);
            $table->tinyInteger('is_service_product')->default(0);
            $table->tinyInteger('is_visible_all')->default(1);
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
        Schema::dropIfExists('products');
    }
}
