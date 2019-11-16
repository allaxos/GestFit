<?php

namespace App\Http\Controllers;

use App\message_users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class DispatcherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }

    public function dispatcher(){
        if(auth()->user()->is_admin==1){
            return redirect(route('adminIndex'));
        }
        else {

            if (auth()->user()->categorie == 1) {
                return redirect(route('proprietaireIndex'));
            } elseif (auth()->user()->categorie == 2) {
                return redirect(route('utilisateurIndex'));
            }
        }





    }
}
