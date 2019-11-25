<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1801_schedule5 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'exclusiveA1',
		'conjugalB1',
		'exclusiveA2',
		'conjugalB2',
		'exclusiveA3',
		'conjugalB3',
		'exclusiveA4',
		'conjugalB4',
		'exclusiveA5',
		'conjugalB5',
		'exclusiveA6',
		'conjugalB6',
		'exclusiveA7',
		'conjugalB7',
		'exclusiveA8',
		'conjugalB8',
		'desc',
		'exclusiveTotalA',
		'conjugalTotalB',
    ];
}
