<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('profil.profilIndex');

    }

    public function contact(){

        return view('profil.profilContact');

    }

    public function resetPassword(){

        return redirect(route('password.request'));
    }

    public function edit(){

        return view('profil.modificationProfil');
    }

    public function update(Request $request){

        $data=$request->validate([
                'name' => ['required', 'string', 'max:50'],
                'lastName' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        $user=auth::user();
        $user->update($data);

        return redirect(route('profilIndex'))->with('infoSuccess',"Votre mot de passe a bien été mis à jour.");


    }
}
