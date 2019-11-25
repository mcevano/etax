<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1600WP_atc extends Model
{
    protected $connection = 'mysql2';
    
    protected $fillable = [
        'form_id',
		'atc',
		'tax',
		'rate',
		'withheld',
    ];
}
