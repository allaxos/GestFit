<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    //
    public function listSalles(){

        return $this->hasMany(Salle::class);

    }
}
