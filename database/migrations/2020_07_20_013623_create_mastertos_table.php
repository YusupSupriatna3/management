<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMastertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastertos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inv_num')->nullable();
            $table->string('bill_prd')->nullable();
            $table->string('pop')->nullable();
            $table->string('business_share')->nullable();
            $table->string('bus_area')->nullable();
            $table->string('account_num')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('nipnas')->nullable();
            $table->string('divisi')->nullable();
            $table->string('curr_type')->nullable();
            $table->string('tot_bill')->nullable();
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
        Schema::dropIfExists('mastertos');
    }
}
