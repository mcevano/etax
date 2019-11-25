<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1601FQ_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id',
		'treaty',
		'atc',
		'nature',
		'income',
		'rate',
		'withheld',
    ];
}
