<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2550M_schedule4 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'input_tax',
		'taxable_sales',
		'total_sales',
		'tax_not_direct',
		'total_not_direct',
		'government',
		'standard_tax',
		'total',
    ];
}
