<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localite;
class LocaliteController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');


    }

    public function index(){

        $localite=Localite::all();
        return view('localite.localiteIndex',compact('localite'));
    }
    public function create(){


        $localite=Localite::all();
        return view('localite.localiteCreate',compact('localite'));

    }

    public function store(){

        $data=request()->validate([
            'name'=>'required',
            'codePostal'=>'required',
        ]);

        Localite::create($data);
        return redirect(route('LocaliteView'))->with('success', 'La localite a bien été enregistré.');

    }
    public function edit(Localite $localite){
        return view('localite.localiteEdit',compact('localite'));
    }

    public function destroy(Localite $localite){
        $localite->delete ();
        return redirect()->back()->with('success', 'localite a bien été supprimer');
    }

    public function updateData(Localite $localite){
        $data=request()->validate([
            'name' => ['required', 'string', 'max:20'],
            'codePostal' => ['required', 'numeric',],

        ]);
        $localite->update($data);
        return redirect(route('LocaliteView'))->with('success','la localite  a bien été modifier');

    }
}
