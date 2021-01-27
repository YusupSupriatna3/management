<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice1 extends Model
{
    protected $table = 'invoice';
    protected $fillable = [
        'no_invoice',
        'bill_prod',
        'pop',
        'business_share',
        'bus_area',
        'account',
        'cust_name',
        'nipnas',
        'divisi',
        'aoc',
        'curr_type',
        'total_bill',
        'layanan',
        'alamat_1',
        'alamat_2',
        'alamat_3',
        'invoice_status',
        'print_status',
        'print_date',
        'mitra_printing',
        'delivery_date',
        'mitra_delivery',
        'delivery_name',
        'catatan',
        'no_resi',
        'ba',
        'status',
        'tanggal',
        'ketarangan2',
        'nama_penerima'
        ];
    /**
     * Method One To Many 
     */
}

