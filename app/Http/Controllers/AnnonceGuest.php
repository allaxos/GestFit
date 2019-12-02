<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Localite;
use Illuminate\Http\Request;

class AnnonceGuest extends Controller
{
    //
    public function index(){

        $annonces=Annonce::where('dateLocation','<=',now())->paginate(4);

        return view('annonceGuest.annonceGuestIndex',compact('annonces'));

    }

    public function createReferencement($id){
        $annonce=Annonce::find($id);


       // session()->put('annonce',$annonce);
       // return redirect(route('annonceGuestAffiche1',$annonce->salle->localite->name))->with('annonce',$annonce);
        return view('annonceGuest.annonceGuestAffiche')->with('annonce',$annonce);
    }

   // public function create(){
  //      $annonce=session('annonce');
   //     dd(session('annonce'));
   //     return view('annonceGuest.annonceguestAffiche')->with('annonce',$annonce);
   // }

    public function recherche(){
        $localites=Localite::all();
        return view('annonceGuest.recherchAnnonces')->with('localites',$localites);
    }
}
