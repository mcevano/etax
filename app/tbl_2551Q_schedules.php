<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2551Q_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
    	'atc',
    	'amount',
    	'tax_rate',
    	'tax_due',
    ];
}
