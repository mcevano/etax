<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1601EQ_schedule extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id', 'atc', 'tax_base','rate','withheld', 
    ];
}
