<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recherche extends Model
{

    public function search($data){

        $annonces=$this->rechercherLieu($data);

        if($annonces==null) {
            $annonces = Annonce::where('dateLocation', '>=', now()->format('Y-m-d'));
        }

        if($data['nameSalle']){

            $annonces=$annonces->where('name','like','%'.$data['nameSalle'].'%');

        }

        if($data['prixMin']){
                $annonces=$annonces->where('prix','>=',$data['prixMin']);

        }

        if($data['prixMax']){

                $annonces=$annonces->where('prix','<=',$data['prixMax']);

        }

        if($data['dateLocation']){
                $date=date('Y-m-d',strtotime($data['dateLocation']));
                $annonces=$annonces->where('dateLocation',$date);
        }
        if(sizeof($annonces->get())==0){
            $annonces=null;
        }

        return $annonces;

    }

    private function rechercherLieu($data){

        if($data['localite_id']){

            $salles=Salle::where('localite_id',$data['localite_id'])->get();

            if(sizeof($salles)!=0){
                $annonces=Annonce::where('dateLocation','>=',now()->format('Y-m-d'));
                $cpt=0;
                foreach ($salles as $salle){
                    if($cpt==0) {
                        $annonces = $annonces->Where('salle_id', $salle->id);
                        $cpt++;
                    }else {
                        $annonces=$annonces->orWhere('salle_id', $salle->id);

                    }

                }
            }else{
                $annonces= null;
            }
        }else{
            $annonces=Annonce::where('dateLocation','>=',now()->format('Y-m-d'));
        }

        return $annonces;

    }
    //
}
