<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageContact extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'message',
    ];

}
