<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200A_cal5 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'atc',
		'description',
		'itemA',
		'itemB',
		'itemC',
		'itemD',
		'itemE',
    ];
}
