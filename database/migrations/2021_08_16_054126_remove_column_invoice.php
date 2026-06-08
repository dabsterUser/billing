<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('total_cgst_rate');
            $table->dropColumn('total_sgst_rate');
            $table->dropColumn('total_igst_rate');
            $table->dropColumn('other_tax_type_minus');
            $table->dropColumn('other_tax_in_rupee');
            $table->dropColumn('other_tax_value');
            $table->dropColumn('other_tax_amount');
            $table->dropColumn('total_discount_type_minus');
            $table->dropColumn('total_discount_in_rupee');
            $table->dropColumn('total_discount_value');
            $table->dropColumn('total_discount_amount');
            $table->decimal('total_discount_in_amount', 8,  2);
            $table->decimal('total_discount_in_percentage', 8,  2);
            $table->decimal('total_gst_rate', 8,  2);
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
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('total_discount_in_amount');
            $table->dropColumn('total_discount_in_percentage');
            $table->dropColumn('total_gst_rate');
            $table->decimal('total_cgst_rate', 8,  2);
            $table->decimal('total_sgst_rate', 8,  2);
            $table->decimal('total_igst_rate', 8,  2);
            $table->enum('other_tax_type_minus', ['1', '0'])->default('1');
            $table->enum('other_tax_in_rupee', ['1', '0'])->default('1');
            $table->decimal('other_tax_value', 8,  2);
            $table->decimal('other_tax_amount', 8,  2);
            $table->enum('total_discount_type_minus', ['1', '0'])->default('1');
            $table->enum('total_discount_in_rupee', ['1', '0'])->default('1');
            $table->decimal('total_discount_value', 8,  2);
            $table->decimal('total_discount_amount', 8,  2);
        });
    }
}
