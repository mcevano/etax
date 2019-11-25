<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2551M_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
		    'form_id',
			'period',
			'agent',
			'payments',
			'withheld',
			'applied',    
    ];
}