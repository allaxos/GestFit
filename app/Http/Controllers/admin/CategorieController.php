<?php

namespace App\Http\Controllers\admin;

use App\categorie;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');


    }

    public function index(){

        $categorie=categorie::all();
        return view('categorie.categorieIndex',compact('categorie'));
    }
    public function create(){


        $categorie=categorie::all();
        return view('categorie.categorieCreate',compact('categorie'));

    }

    public function store(){

        $data=request()->validate([
            'name'=>'required',
        ]);

        Categorie::create($data);
        return redirect(route('CategorieView'))->with('success', 'La categorie a bien été enregistré.');

    }
    public function destroy(Categorie $categorie){
        $categorie->delete ();
        return redirect()->back()->with('success', 'categorie a bien été supprimer');
    }




}
