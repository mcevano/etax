<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2550Q_schedule7 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'period',
		'miller',
		'taxpayer',
		'receipt',
		'amount',
		'previous',
		'current',
    ];
}
