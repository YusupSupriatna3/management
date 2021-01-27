<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bill_prod')->nullable();
            $table->string('account')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('nipnas')->nullable();
            $table->string('divisi')->nullable();
            $table->string('aoc')->nullable();
            $table->string('curr_type')->nullable();
            $table->string('total_bill')->nullable();
            $table->string('invoice_status')->nullable();
            $table->string('print_status')->nullable();
            $table->string('print_date')->nullable();
            $table->string('mitra_printing')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('mitra_delivery')->nullable();
            $table->string('delivery_name')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('no_resi')->nullable();
            $table->string('status')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('jabatan_penerima')->nullable();
            $table->string('nama_penerima')->nullable();
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
        Schema::dropIfExists('Invoice');
    }
}
