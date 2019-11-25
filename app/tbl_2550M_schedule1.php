<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2550M_schedule1 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
	    	'form_id',
			'atc',
			'description',
			'amount',
			'output',
    ];
}
