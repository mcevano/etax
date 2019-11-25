<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1600_atc extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
       'form_id',
		'atc',
		'base',
		'rate',
		'withheld',
    ];
}
