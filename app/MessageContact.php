<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class
MessageContact extends Model
{
    // faire un controller pour messageContact
    protected $fillable = [
        'name', 'email', 'message',
    ];



}
