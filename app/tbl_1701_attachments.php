<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_1701_attachments extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
    	'form_id',
		'page1_tax_regime',
		'scheduleA_item4B',
		'scheduleA_item4E',
		'scheduleB_item12',
		'scheduleB_item13',
		'scheduleC_item17D_description',
		'scheduleD_totalA',
		'scheduleD_totalB',
		'tax_regime',
		'page3_item10',
		'page3_item11',
		'page4_item17D',
		'page4_item5',
		'page4_item10',
    ];
}
