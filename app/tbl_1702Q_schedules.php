<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1702Q_schedules extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id','q1','q2','q3','total_gross','total_income',
    ];
}
