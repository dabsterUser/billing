<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->tinyInteger('po_no')->default(0)->comment('1= enable, 0 =disable');
            $table->tinyInteger('lr_no')->default(0)->comment('1= enable, 0 =disable');
            $table->string('invoice_no_prefix',198)->nullable();
            $table->string('invoice_no_postfix',198)->nullable();
            $table->string('term_condition_title',255)->nullable();
            $table->text('term_condition')->nullable();
            $table->enum('type', ['invoice', 'delivery_challan','quotation','proforma_invoice','purchase_order','debit_note','credit_note','other'])->default('invoice');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('invoice_options');
    }
}
