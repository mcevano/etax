<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1801_schedule2 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'name',
		'stock',
		'shares',
		'fair',
		'conjugal',
		'exclusive',
    ];
}
