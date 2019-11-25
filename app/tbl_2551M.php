<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2551M extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
		'form_no',
		'company_id',
		'item1',
		'item2A',
		'item2B',
		'item3A',
		'item3B',
		'item4',
		'item5',
		'item13A',
		'item13B',
		'item19',
		'item20A',
		'item20B',
		'item21',
		'item22',
		'item23A',
		'item23B',
		'item23C',
		'item23D',
		'item24',
		'item_overpayment',
		'total_amount',
    ];
}
