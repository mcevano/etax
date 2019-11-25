<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2000_schedule4 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'rdo_code',
		'remittance',
		'bank',
		'remitted',
		'from',
		'to',
    ];
}
