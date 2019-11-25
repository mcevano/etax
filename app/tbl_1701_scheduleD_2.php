<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1701_scheduleD_2 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'description',
		'legal',
		'taxpayer',
		'spouse',
    ];
}
