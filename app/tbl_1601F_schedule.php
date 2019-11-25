<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1601F_schedule extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id', 'treaty','atc','income','rate','withheld', 
    ];
}
