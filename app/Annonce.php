<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{


    protected $fillable=[
        'name' ,
        'prix',
        'salle_id',
        'dateLocation' ,
        'timeDebut' ,
        'timeFin' ,
        'description',
        'user_id' ,
        ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function salle(){

        return $this->belongsTo(Salle::class);
    }
}
