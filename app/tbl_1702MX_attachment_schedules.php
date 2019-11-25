<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702MX_attachment_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'schedule',
		'item',
		'description',
		'amount',
    ];
}
