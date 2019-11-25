<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_2200A extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'form_no',
		'company_id',
		'item1A',
		'item1B',
		'item1C',
		'item2',
		'item3',
		'item10',
		'item12A',
		'item12B',
		'item12C',
		'item13A',
		'item13B',
		'item13C',
		'item14',
		'item14A',
		'item15',
		'item17',
		'item17_other',
		'item18',
		'item19A',
		'item19B',
		'item19C',
		'item20',
		'item21',
		'item22',
		'item23A',
		'item23B',
		'item23C',
		'item23D',
		'item24',
		'item25A',
		'item25B',
		'item25C',
		'item26',
		'total_due',
		'SubTotal_XA035_Bottle',
		'SubTotal_XA035_Bulk',
		'SubTotal_XA036_Bottle',
		'SubTotal_XA036_Bulk',
		'SubTotal_XA061',
		'SubTotal_XA062',
		'SubTotal_XA070',
		'SubTotal_XA080',
		'SubTotal_XA055',
		'SubTotal_XA056',
		'SubTotal_XA057',
    ];
}
