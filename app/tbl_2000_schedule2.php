<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2000_schedule2 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'date',
		'receipt',
		'amount',
    ];
}
