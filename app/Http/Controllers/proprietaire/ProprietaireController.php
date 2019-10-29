<?php

namespace App\Http\Controllers\proprietaire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProprietaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){

        return view('proprietaire.indexProprietaire');

    }
}
