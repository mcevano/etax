<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702RT_schedule3 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'item_no',
		'description',
		'amount',
    ];
}
