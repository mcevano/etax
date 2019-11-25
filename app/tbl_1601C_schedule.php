<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1601C_schedule extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_id', 'previous','paid','code','tax_paid','tax_due', 'adjustment'
    ];
}
