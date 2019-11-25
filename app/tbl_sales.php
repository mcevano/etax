<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_sales extends Model
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
			'gross_sales',
			'exempt',
			'zero_rated',
			'taxable_sales',
			'output_tax',
			'gross_taxable_sales',
    ];
}
