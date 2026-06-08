<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name',168);
            $table->string('type',168);
            $table->string('pan_number',16)->nullable();
            $table->string('gstin',128);
            $table->tinyInteger('update_all')->default(0);
            $table->string('lut_number',128)->nullable();
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->string('pincode',32);
            $table->integer('state_id');
            $table->string('city',128);
            $table->string('website',255)->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
