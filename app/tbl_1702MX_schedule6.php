<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702MX_schedule6 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'description',
		'legal_basis',
		'itemA',
		'itemB',
		'itemC',
		'itemD',
    ];
}
