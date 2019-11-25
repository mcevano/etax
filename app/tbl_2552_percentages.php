<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2552_percentages extends Model
{
    protected $connection = 'mysql2';
    
    protected $fillable = [
    	'form_id',
		'date',
		'seller',
		'buyer',
		'corporation',
		'shares',
    ];
}
