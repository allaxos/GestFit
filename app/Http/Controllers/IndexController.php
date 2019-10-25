<?php

namespace App\Http\Controllers;

use App\categorie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        session(['categorie' => categorie::all()]);
        return view('welcome');
    }
}
