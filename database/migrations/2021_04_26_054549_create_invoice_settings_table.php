<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->tinyInteger('enable_product_note')->default(1)->comment('1 = enable,0=disable');
            $table->tinyInteger('enable_round_off')->default(1)->comment('1 = enable,0=disable');
            $table->tinyInteger('enable_round_off_value')->default(1)->comment('1 = enable,0=disable');
            $table->tinyInteger('allow_oversell')->default(1)->comment('1 = enable,0=disable');
            $table->text('default_product_note');
            $table->string('default_payment_type',120);
            $table->string('default_due_date',120);
            $table->tinyInteger('enable_discount')->default(1)->comment('1 = enable,0=disable');
            $table->enum('discount_in', ['percentage', 'rupee'])->default('percentage');
            $table->tinyInteger('disc_per_item')->default(1)->comment('1 = enable,0=disable');
            $table->tinyInteger('always_show_discount_column')->default(1)->comment('1 = enable,0=disable');
            $table->tinyInteger('quantity_decimal_value')->default(2)->comment('0,1,2,3');
            $table->tinyInteger('price_decimal_value')->default(2)->comment('0,1,2,3,4');
            $table->tinyInteger('taxable_decimal_value')->default(2)->comment('2,3,4');
            $table->tinyInteger('gst_rate_decimal_value')->default(2)->comment('2,3');
            $table->tinyInteger('gst_decimal_value')->default(2)->comment('2,3');
            $table->tinyInteger('enable_signature_img')->default(1)->comment('1= enable, 0 =disable');
            $table->string('other_tax_label_op',180);
            $table->string('total_discount_label_op',180)->default('');
            $table->string('logo_image',255)->default('');
            $table->string('signature_image',255)->default('');
            $table->string('invoice_background_img',255)->default('');
            $table->string('invoice_footer_img',255)->default('');
            $table->string('invoice_title',255)->default('');
            $table->string('invoice_prefix',255)->default('');
            $table->string('invoice_postfix',255)->default('');
            $table->tinyInteger('diffrent_invoice_series_for_export')->default(1)->comment('1= enable, 0 =disable');
            $table->string('export_prefix',255)->default('');
            $table->string('export_postfix',255)->default('');
            $table->tinyInteger('enable_challan')->default(1)->comment('1= enable, 0 =disable');
            $table->string('challan_no_lable',255);
            $table->tinyInteger('enable_challan_date')->default(1)->comment('1= enable, 0 =disable');
            $table->string('challan_date_lable',255);
            $table->string('ewaybill_no_lable',255);
            $table->string('original_copy_name',255);
            $table->string('duplicate_copy_name',255);
            $table->string('transport_copy_name',255);
            $table->string('office_copy_name',255);
            $table->string('term_title',255);
            $table->text('banktc');
            $table->string('sales_invoice_default_sort',180);
            $table->string('default_invoice_type',180);
            $table->integer('default_customer')->default(0);
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
        Schema::dropIfExists('invoice_settings');
    }
}
