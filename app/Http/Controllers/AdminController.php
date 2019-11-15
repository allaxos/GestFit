<?php

namespace App\Http\Controllers;

use App\message_users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');
    }
    //
    public function index(){
        return view('adminIndex');
    }



}
