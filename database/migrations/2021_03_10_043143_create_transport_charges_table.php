<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name',256);
            $table->text('product_note');
            $table->decimal('sell_price', 8,  2);
            $table->string('hsn',128);
            $table->enum('type', ['taxable', 'nill_rated','exempted','non_gst'])->default('taxable');
            $table->tinyInteger('no_itc')->default(1);
            $table->integer('cgst')->default(0);
            $table->integer('sgst')->default(0);
            $table->integer('igst')->default(0);
            $table->tinyInteger('is_visible_all')->default(1);
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
        Schema::dropIfExists('transport_charges');
    }
}
