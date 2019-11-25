<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2000 extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_no',
		'company_id',
		'item1A',
		'item1B',
		'item2',
		'item3',
		'item10',
		'item11',
		'item11_other',
		'item12',
		'item13A',
		'item13B',
		'item13C',
		'item14',
		'item15A',
		'item15B',
		'item15C',
		'item15D',
		'item16',
		'item17A',
		'item17B',
		'item17C',
		'item17D',
		'item18',
		'item19',
    ];
}
