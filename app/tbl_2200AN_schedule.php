<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200AN_schedule extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    'form_id',
	'schedB',
	'schedC',
	'schedD',
	'schedE',
	'tax_due',
    ];
}
