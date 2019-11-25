<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1701A_modal1 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'description',
		'taxpayer',
		'spouse',
    ];
}
