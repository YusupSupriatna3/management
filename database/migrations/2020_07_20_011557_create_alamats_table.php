<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masteralamat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account')->nullable();
            $table->string('payment_no')->nullable();
            $table->string('order_id')->nullable();
            $table->string('nama_cc')->nullable();
            $table->string('cq')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nama_gedung')->nullable();
            $table->string('lantai')->nullable();
            $table->string('nama_jalan')->nullable();
            $table->string('kavling')->nullable();
            $table->string('no_gedung')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('city')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('aoc')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_cc')->nullable();
            $table->string('segment')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('masteralamat');
    }
}
