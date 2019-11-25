<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2552_schedules extends Model
{
    protected $connection = 'mysql2';
    
    protected $fillable = [
    	'form_id',
		'date',
		'seller',
		'buyer',
		'corporation',
		'shares',
		'base',
		'rate',
		'tax_due',
    ];
}
