<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DateTime;
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


    public function checkTimeCorrect(){
        $dateStart=request('timeDebut');
        $dateEnd=request('timeFin');
        $format = 'H:i';
        $newdateDebut = DateTime::createFromFormat($format, $dateStart);
        $newdateFin=DateTime::createFromFormat($format, $dateEnd);
        if($newdateFin<$newdateDebut) {
            return false;
        }
        else{
            return true;
        }

    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function salle(){

        return $this->belongsTo(Salle::class);
    }

    public function image(){

        return $this->hasMany(Image::class);
    }


}
