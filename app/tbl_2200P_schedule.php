<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200P_schedule extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
	    'form_id',
		'removal',
		'locally',
		'imported',
		'removals',
		'stocks',
		'underbond',
		'exports',
		'others',
		'tax-free',
		'tax_due',
    ];
}
