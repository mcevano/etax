<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702EX_schedule8 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'name',
		'tin1',
		'tin2',
		'tin3',
		'tin4',
		'capital',
		'total',
    ];
}
