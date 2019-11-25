<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702EX_schedule9_1 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'description',
		'exempt',
		'amount',
		'withheld',
    ];
}
