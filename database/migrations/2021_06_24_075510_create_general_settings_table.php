<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->tinyInteger('due_date')->default(1)->comment('1 =show,0=hide');
            $table->tinyInteger('challan_date_no')->default(1)->comment('1 =show,0=hide');
            $table->tinyInteger('e_way_no')->default(1)->comment('1 =show,0=hide');
            $table->tinyInteger('transport')->default(1)->comment('1 =show,0=hide');
            $table->tinyInteger('discount_box')->default(1)->comment('1 =show,0=hide');
            $table->tinyInteger('pan_no')->default(1)->comment('1 =show,0=hide');
            $table->tinyInteger('show_price_last')->default(0)->comment('1 =show,0=hide');
            $table->tinyInteger('allow_oversell')->default(0)->comment('1 =show,0=hide');
            $table->tinyInteger('default_first_page')->default(0)->comment('1 =sale_invoice,2=analytics');
            $table->tinyInteger('enable_round')->default(0)->comment('1=enable,0=disable');
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
        Schema::dropIfExists('general_settings');
    }
}
