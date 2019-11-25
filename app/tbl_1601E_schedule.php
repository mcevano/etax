<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1601E_schedule extends Model
{
	protected $connection = 'mysql2';

    protected $fillable = [
        'form_id', 'atc','description','tax_base','rate','withheld', 
    ];
}
