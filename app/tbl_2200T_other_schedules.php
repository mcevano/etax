<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200T_other_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'atc',
		'description',
		'measure',
		'rate',
		'exempt',
		'taxable',
		'tax_due',
    ];
}
