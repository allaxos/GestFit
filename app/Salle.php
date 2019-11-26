<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Salle extends Model
{
    //

    protected $fillable =['name','adresse','description','localite_id','user_id'];
    public function localite(){

        return $this->belongsTo(Localite::class);
    }

    public function annonce(){

        return $this->hasMany(Annonce::class);
    }
}
