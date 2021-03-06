<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Localite;
use App\Recherche;
use Illuminate\Http\Request;

class AnnonceGuest extends Controller
{
    //
    public function index(){

        $annonces=Annonce::where('dateLocation','>=',now()->format('y-m-d'))->paginate(4);

        return view('annonceGuest.annonceGuestIndex',compact('annonces'));

    }

    public function createReferencement($id){
        $annonce=Annonce::find($id);

        session(['title' => substr($annonce->name,0,69).'...']);
        session(['description' => 'salle en location pour sport :'.substr($annonce->salle->description,0,159).'...']);
        return view('annonceGuest.annonceGuestAffiche')->with('annonce',$annonce);
    }

   // public function create(){
  //      $annonce=session('annonce');
   //     dd(session('annonce'));
   //     return view('annonceGuest.annonceguestAffiche')->with('annonce',$annonce);
   // }

    public function recherche(){
        $localites=Localite::where('id','!=',0)->orderBy('name')->get();
        return view('annonceGuest.recherchAnnonces')->with('localites',$localites);
    }

    public function rechercheResultat(Request $request){
        $recherche=new Recherche();

        $annonces=$recherche->search($request->request->all());


        if($annonces!=null){
            $annonces=$annonces->paginate(10);
            return view('annonceGuest.annonceGuestIndex',compact('annonces'));
        }else{

            return redirect(route('recherche'))->with('infoDanger',' pas de résultats pour votre rechrche');
        }


    }
    public function rechercheResultatLieu(Request $request){
        $recherche=new Recherche();

        $annonces=$recherche->rechercherLieu($request->request->all());


        if($annonces!=null){
            $annonces=$annonces->paginate(10);
            return view('annonceGuest.annonceGuestIndex',compact('annonces'));
        }else{

            return redirect(route('recherche'))->with('infoDanger',' pas de résultats pour votre recherche');
        }


    }


}
