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
        $this->middleware('verified');
        $this->middleware('notAdmin');


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

    public function updateData(Request $request){

        $data=$request->validate([
                'name' => ['required', 'string', 'max:50'],
                'lastName' => ['required', 'string', 'max:50'],
            ]);
        $user=auth::user();
        $user->update($data);
        return redirect(route('profilIndex'))->with('infoSuccess',"Votre profil a bien été mis à jour.");

    }

    public function updateEmail(Request $request){

        $request->request->set('email_verified_at' ,null);
        $data=$request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email_verified_at' => '',
        ]);

        $user=auth::user();
        $user->email_verified_at=null;
        $user->save();
        $user->update($data);

        return redirect(route('profilIndex'))->with('infoSuccess',"Votre profil a bien été mis à jour.");

    }

}
