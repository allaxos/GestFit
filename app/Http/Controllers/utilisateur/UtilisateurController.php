<?php

namespace App\Http\Controllers\utilisateur;

use App\message_users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilisateurController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){

        $message= new message_users();
        $countMessageNotRead=$message->getCountMessageNotRead(auth()->user());
        return view('utilisateur.indexUtilisateur',compact('countMessageNotRead'));

    }
}
