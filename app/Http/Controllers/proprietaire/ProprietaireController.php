<?php

namespace App\Http\Controllers\proprietaire;

use App\message_users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProprietaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('notAdmin');


    }

    //
    public function index(){
        $message= new message_users();
        $countMessageNotRead=$message->getCountMessageNotRead(auth()->user());
        return view('proprietaire.indexProprietaire',compact('countMessageNotRead'));

    }
}
