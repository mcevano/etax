<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xml extends Model
{
    protected $fillable = [
        'user_id', 'company_id', 'form_id','form', 'file_name', 'return_period', 'status',
    ];
}
