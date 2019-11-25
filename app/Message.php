<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $connection = 'mysql3';

    protected $fillable = ['member_id', 'project_id', 'message', 'sender'];
}
