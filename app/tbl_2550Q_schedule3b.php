<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2550Q_schedule3b extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'date_purchased',
		'description',
		'amount',
		'tax',
		'estimate',
		'recognized',
		'allowed_tax',
		'balance',
    ];
}
