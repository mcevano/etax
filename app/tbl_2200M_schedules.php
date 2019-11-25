<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200M_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
	    'form_id',
		'removal',
		'itemA',
		'itemB',
		'itemC',
		'itemD',
		'itemF',
		'itemG',
		'itemH',
		'itemJ',
		'itemK',
		'itemL',
    ];
}
