<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702MX_description_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
    	'schedule',
		'description',
		'itemA',
		'itemB',
		'itemC',
		'itemD',
    ];
}
