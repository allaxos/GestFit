<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recherche extends Model
{

    public function search($data){



        if($data['nameSalle']){
            $annonces=Annonce::where('name',$data['nameSalle']);
        }

        if($data['localite_id']){
            $salles=Salle::where('localite_id',$data['localite_id'])->get();
            $cpt=0;

            foreach ($salles as $salle){
                if($cpt==0){
                    $annonces=Annonce::where('salle_id',$salle->id);
                    $cpt++;
                }else{
                    $annonces=$annonces->orWhere('salle_id',$salle->id);
                }

            }


        }

        if($data['prixMin']){
            if($annonces){
                $annonces=$annonces->where('prix','>=',$data['prixMin']);
            }else {
                $annonces = Annonce::where('prix', '>=', $data['prixMin']);
            }
        }

        if($data['prixMax']){
            if($annonces){
                $annonces=$annonces->where('prix','<=',$data['prixMax']);
            }else {
                $annonces = Annonce::where('prix','<=',$data['prixMax']);
            }
        }

        if($data['dateLocation']){
            if($annonces){
                $annonces=$annonces->where('dateLocation',$data['dateLocation']);
            }else {
                $annonces = Annonce::where('dateLocation',$data['dateLocation']);
            }
        }


        if($annonces==null){
            return $annonces=Annonce::where('id','!=',0)->paginate(4);
        }else{
            return $annonces->paginate(4);
        }


    }
    //
}
