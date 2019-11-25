<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2551M_atc extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
		'form_id',
		'atc',
		'description',
		'taxable_amount',
		'tax_rate',
		'tax_due',       
    ];
}
