<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200A_schedule_others extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'atc',
		'description',
		'measure',
		'tax_rate',
		'export',
		'taxable',
		'tax_due',
    ];
}
