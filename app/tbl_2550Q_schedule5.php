<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2550Q_schedule5 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'tax',
		'taxable_sales',
		'input_not_direct',
		'product_not_direct',
		'total_sum',
		'total',
    ];
}
