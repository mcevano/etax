<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1707A_schedule1 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'date_transaction',
		'stock',
		'price',
		'cost',
		'gains',
		'paid',
    ];
}
