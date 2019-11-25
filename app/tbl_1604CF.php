<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1604CF extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_no',
		'company_id',
		'item1',
		'item2',
		'item3',
		'item11',
		'item11A',
		'item11B',
		'item11C',
		'item12',
		'item13',
		'item14',
		'sched1_withheld',
		'sched1_adjustment',
		'sched1_penalties',
		'sched1_total',
		'sched2_withheld',
		'sched2_penalties',
		'sched2_total',
		'sched3_withheld',
		'sched3_penalties',
		'sched3_total',
		'sched4_withheld',
		'sched4_penalties',
		'sched4_total',
    ];
}
