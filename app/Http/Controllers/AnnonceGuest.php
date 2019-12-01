<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;

class AnnonceGuest extends Controller
{
    //
    public function index(){

        $annonces=Annonce::where('dateLocation','<=',now())->paginate(4);

        return view('annonceGuest.annonceGuestIndex',compact('annonces'));

    }
}
