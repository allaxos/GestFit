<?php

namespace App\Http\Controllers\annonce;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnonceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('auth');
    }

    public function index(){

        session(['title' => 'Annonces : salle de sport en location belgique, salle de sport a louer']);
        session(['description' => 'GesFit : toutes les Annonces de location de salle de sport , terrain de sport et salle de fitness en belgique et premiere site de mise en relation de location de salle de sport et terrain de sport.']);

        return view('annonce.annonceIndex')->with('users',User::all());
    }

}
