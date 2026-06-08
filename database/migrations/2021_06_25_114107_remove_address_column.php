<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAddressColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn('shipping_gstin_pan');
            $table->dropColumn('user_id');
            $table->integer('customer_id');
            $table->string('shipping_pan',32);
            $table->string('shipping_gstin',64);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('shipping_gstin_pan',255);
            $table->integer('user_id');
            $table->dropColumn('shipping_pan');
            $table->dropColumn('customer_id');
            $table->dropColumn('shipping_gstin');
        });
    }
}
