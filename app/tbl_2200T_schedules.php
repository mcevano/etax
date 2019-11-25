<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200T_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'export',
		'taxable',
		'tax_due',
    ];
}
