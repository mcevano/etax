<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200T_calculator2 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'description',
		'total_cigars',
    ];
}
