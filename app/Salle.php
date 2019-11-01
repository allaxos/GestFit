<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Salle extends Model
{
    //
    public function localite(){

        return $this->belongsTo(Localite::class);
    }
}
