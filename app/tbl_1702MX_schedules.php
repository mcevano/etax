<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702MX_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'schedule',
		'item',
		'itemA',
		'itemB',
		'itemC',
		'itemD',
    ];
}
