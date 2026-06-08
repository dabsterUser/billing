<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointOfsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_ofsales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->string('customer_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('pan_number')->nullable();
            $table->string('gst_number')->nullable();

            $table->string('invoice_type')->nullable();
            $table->string('invoice_prefix', 128)->default('')->nullable();
            $table->string('invoice_postfix', 128)->default('')->nullable();
            $table->string('invoice_number', 128)->nullable();
            $table->date('bill_date')->nullable();

            $table->string('challan_no', 255)->nullable();
            $table->date('challan_date')->nullable();
            $table->string('order_no', 255)->nullable();
            $table->date('order_no_date')->nullable();

            $table->string('lrno', 255)->nullable();
            $table->string('eway', 255)->nullable();
            $table->date('due_date')->nullable();
            $table->string('bank', 255)->nullable();
            $table->string('payment_type', 255)->nullable();
            $table->text('document_note')->nullable();
            $table->text('payment_note')->nullable();
            $table->text('bank_term_condition')->nullable();
            $table->integer('total_qty')->nullable();
            $table->decimal('total_price', 8, 2)->nullable();
            $table->decimal('total_discount', 8, 2)->nullable();

            $table->decimal('total_gst_rate', 8, 2)->nullable();
            $table->decimal('total_cess_rate', 8, 2)->nullable();
            $table->decimal('item_total', 8, 2)->nullable();
            $table->decimal('total_taxable', 8, 2)->nullable();
            $table->decimal('total_tax', 8, 2)->nullable();

            $table->decimal('other_charges', 8, 2)->nullable();
            $table->decimal('total_discount_in_amount', 8, 2)->nullable();
            $table->decimal('total_discount_in_percentage', 8, 2)->nullable();
            $table->decimal('payment_received', 8, 2)->nullable();
            $table->decimal('hidden_round_off_value', 8, 2)->nullable();
            $table->string('hidden_grandtotalwords', 164)->nullable();
            $table->enum('type', ['sale', 'purchase'])->default('sale')->nullable();
            $table->decimal('grand_total', 8, 2);

            $table->string('sale_receipt_amount')->nullable();
            $table->string('sale_receipt_id')->nullable();

            $table->enum('status', ['active', 'inactive', 'cancel'])->default('active');
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
        Schema::dropIfExists('point_ofsales');
    }
}
