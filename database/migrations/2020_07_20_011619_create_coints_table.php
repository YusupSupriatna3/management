<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastercoin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account')->nullable();
            $table->string('no_invoice')->nullable();
            $table->string('nama_cc')->nullable();
            $table->string('bulan')->nullable();
            $table->string('alamat_1')->nullable();
            $table->string('alamat_2')->nullable();
            $table->string('alamat_3')->nullable();
            $table->string('tagihan')->nullable();
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
        Schema::dropIfExists('mastercoin');
    }
}
