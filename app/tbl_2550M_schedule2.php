<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2550M_schedule2 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
	    	'form_id',
			'date_purchased',
			'description',
			'amount',
			'tax',
    ];
}
