<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200T_calculator5 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'description',
		'cases',
		'reams_case',
		'reams',
		'packs_reams',
		'packs',
    ];
}
