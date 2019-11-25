<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1600 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_no',
		'company_id',
		'item1A',
		'item1B',
		'item2',
		'item3',
		'item4',
		'item12',
		'item13',
		'item13_others',
		'item14',
		'item15',
		'item16',
		'item17A',
		'item17B',
		'item17C',
		'item17D',
		'item18',
		'total_sched',
    ];
}
