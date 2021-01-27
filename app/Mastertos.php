<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mastertos extends Model
        {
            protected $table = 'mastertos';
            protected $fillable = ['inv_num',
                    'bill_prd',
                    'pop',
                    'business_share',
                    'bus_area',
                    'account_num',
                    'cust_name',
                    'nipnas',
                    'divisi',
                    'curr_type',
                    'tot_bill'
                ];
    /**
     * Method One To Many 
     */
}
