<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200M_schedule_others extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
	    'form_id',
		'atc',
		'description',
		'removal',
		'itemA',
		'itemB',
		'itemC',
		'itemD',
		'itemE',
		'itemF',
		'itemG',
		'itemH',
		'itemI',
		'itemJ',
		'itemK',
		'itemL',
    ];
}
