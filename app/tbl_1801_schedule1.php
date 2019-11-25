<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1801_schedule1 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'oct',
		'td',
		'location',
		'class',
		'area',
		'zonal',
		'fair',
		'conjugal',
		'exclusive',
    ];
}
