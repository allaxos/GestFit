<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //



    protected $fillable=['description','image','annonce_id'];

    public function annonce(){

        return $this->belongsTo(Annonce::class);
    }



}
