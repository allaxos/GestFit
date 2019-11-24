<?php

namespace App\Http\Controllers\annonce;

use App\Annonce;
use App\Salle;
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
        $this->middleware('notAdmin');
    }

    public function index(){

        session(['title' => 'Annonces : salle de sport en location belgique, salle de sport a louer']);
        session(['description' => 'GesFit : toutes les Annonces de location de salle de sport , terrain de sport et salle de fitness en belgique et premiere site de mise en relation de location de salle de sport et terrain de sport.']);

        return view('annonce.annonceIndex');

    }

    public function create(){

        $salles=Salle::where('user_id',auth()->user()->id)->get();
        return view('annonce.creationAnnonce',compact('salles'));
    }

    public function store(Request $request){

        $request->request->set('user_id',auth()->user()->id);
        $data=$request->validate([
                'name' => 'bail|required',
                'prix' => 'required|numeric|between:1,9999',
                'salle_id' => 'required',
                'dateLocation' => 'date|required',
                'timeDebut' => 'date_format:H:i',
                'timeFin' => 'date_format:H:i',
                'description' => 'required|max:900',
                'user_id' => '',
            ]
        );
        Annonce::create($data);
        $annonces=Annonce::where('user_id',auth()->user()->id);

        return view('annonce.annonceIndex',compact('annonces'));

    }

}
