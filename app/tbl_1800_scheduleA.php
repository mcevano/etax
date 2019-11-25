<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1800_scheduleA extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'particulars',
		'stranger',
		'relative',
    ];
}
