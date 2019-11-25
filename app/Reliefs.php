<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reliefs extends Model
{
    protected $fillable = [
        'user_id','company_id','file_name','ext','date','fiscal','creditable','non_creditable','excel_file', 'type',
    ];

}
