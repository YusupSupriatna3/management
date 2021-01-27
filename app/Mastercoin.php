<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mastercoin extends Model
        {
            protected $table = 'mastercoin';
            protected $fillable = ['account',
                    'no_invoice',
                    'nama_cc',
                    'bulan',
                    'alamat_1',
                    'alamat_2',
                    'alamat_3',
                    'tagihan'
                ];
    /**
     * Method One To Many 
     */
}
