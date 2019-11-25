<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2000_schedule1 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'atc',
		'tax_base',
		'tax_rate',
		'tax_due',
    ];
}
