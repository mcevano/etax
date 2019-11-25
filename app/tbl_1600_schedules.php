<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1600_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'tin',
		'name',
		'atc',
		'description',
		'amount',
		'rate',
		'withheld',
    ];
}
