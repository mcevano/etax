<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1800_scheduleB extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'classification',
		'area',
		'location',
		'property',
		'stranger',
		'relative',
    ];
}
