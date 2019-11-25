<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_purchases extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
	    	'data_id',
			'company_id',
			'tin',
			'reg_name',
			'lastname',
			'firstname',
			'middlename',
			'address',
			'city',
			'gross_purchase',
			'exempt_purchase',
			'zero_rated',
			'taxable_purchase',
			'services',
			'capital_goods',
			'other_goods',
			'input_tax',
			'gross_taxable_purchase',
    ];
}
