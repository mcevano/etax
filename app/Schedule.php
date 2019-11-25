<?php

namespace App;

use \MaddHatter\LaravelFullcalendar\Event;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model 
{
    protected $fillable = ['schedule', 'start_date', 'end_date'];
}
