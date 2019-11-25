<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1707A_schedule2 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'date_transaction',
		'stock',
		'price',
		'cost',
		'loss',
    ];
}
