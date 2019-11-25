<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1604CF_schedule2 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'date',
		'bank',
		'withheld',
		'penalties',
		'total',
    ];
}
