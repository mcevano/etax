<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1604CF_schedule1 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'date',
		'bank',
		'withheld',
		'adjustment',
		'penalties',
		'total',
    ];
}
