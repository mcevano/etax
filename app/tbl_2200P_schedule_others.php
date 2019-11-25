<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200P_schedule_others extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
	    'form_id',
		'atc',
		'description',
		'measure',
		'applicable_rate',
		'removal',
		'locally',
		'imported',
		'taxable_removals',
		'tax_paid',
		'underbond',
		'exports',
		'others',
		'tax_free',
		'tax_due',
    ];
}
