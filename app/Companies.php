<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'user_id','tin1','tin2','tin3','tin4', 'line_business', 'firstname', 'middlename', 'lastname','registered_name', 'city', 'district', 'substreet', 'street', 'barangay', 'address', 'zip_code', 'tel_number', 'email_address', 'rdo_code', 'type',
    ];

}
