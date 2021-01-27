<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlamatPengiriman extends Model
{
    protected $table = 'masteralamat';
    protected $fillable = ['account',
                        'payment_no',
                        'order_id',
                        'nama_cc',
                        'cq',
                        'jabatan',
                        'nama_gedung',
                        'lantai',
                        'nama_jalan',
                        'kavling',
                        'no_gedung',
                        'kecamatan',
                        'city',
                        'provinsi',
                        'kode_pos',
                        'aoc',
                        'email',
                        'phone_cc',
                        'segment',
                        'keterangan'
        ];
}
