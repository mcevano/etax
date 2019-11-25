<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1801_schedule4 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'particulars',
		'exclusive',
		'conjugal',
    ];
}
