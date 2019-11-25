<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702MX_schedule7a extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
    	'year',
		'itemA',
		'itemB',
		'itemC',
		'itemD',
		'itemE',
    ];
}
