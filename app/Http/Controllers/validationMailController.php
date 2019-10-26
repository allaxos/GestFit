<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class validationMailController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function isValidate(){

        if(auth()->user()->email_verified_at==null){
            return view('auth.verify');
        }else{
            return view('/home');
        }

    }
}
