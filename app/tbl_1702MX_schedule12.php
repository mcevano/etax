<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702MX_schedule12 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'registered_name',
		'tinA',
		'tinB',
		'tinC',
		'tinD',
		'contribution',
		'total',
    ];
}
