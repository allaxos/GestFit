<?php

namespace App\Http\Controllers;

use App\categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->email_verified_at==null){
            return view('auth.verify');
        }else{
            return view('/home');
        }

    }

    public function admin()

    {
        return view('admin');

    }
}
