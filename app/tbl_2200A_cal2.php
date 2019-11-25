<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200A_cal2 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'brand',
		'itemA',
		'itemB',
		'itemC',
		'itemD',
    ];
}
