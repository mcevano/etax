<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702MX_attachment_schedule_h extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
    	'item',
		'description',
		'legal_basis',
		'amount',
    ];
}
