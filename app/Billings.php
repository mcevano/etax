<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billings extends Model
{
    protected $fillable = [
        'billing_id', 'ref_no', 'status',
    ];
}
