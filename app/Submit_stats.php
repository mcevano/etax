<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submit_stats extends Model
{
    protected $fillable = [
        'xml_id', 'ref_no', 'status',
    ];
}
