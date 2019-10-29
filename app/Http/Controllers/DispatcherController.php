<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispatcherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dispatcher(){

        if (auth()->user()->categorie==1){
            return redirect(route('proprietaireIndex'));
        }elseif(auth()->user()->categorie==2){
            return redirect(route('utilisateurIndex'));
        }}
}
