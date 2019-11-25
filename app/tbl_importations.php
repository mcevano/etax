<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_importations extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
	    	'data_id',
			'company_id',
			'entry_no',
			'release_date',
			'seller_name',
			'import_date',
			'country_origin',
			'landed_cost',
			'dutiable_value',
			'charges_before_custom',
			'taxable_imports',
			'exempt',
			'vat',
			'or_number',
			'vat_date',
			
    ];
}
