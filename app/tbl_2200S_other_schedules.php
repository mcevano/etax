<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200S_other_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'atc',
		'description',
		'unit',
		'rate',
		'sales',
		'removals',
		'tax_due',
    ];
}
