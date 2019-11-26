<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    protected $fillable = [
        'name','codePostal'
    ];
    public function listSalles(){

        return $this->hasMany(Salle::class);

    }
}
