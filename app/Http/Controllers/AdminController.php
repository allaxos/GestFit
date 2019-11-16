<?php

namespace App\Http\Controllers;

use App\message_users;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');
        $this->repository=$repository;

    }
    //
    public function index(){
        return view('adminIndex');
    }
    public function show(){
        $users=$this->repository->getAll();
        return view('adminView',compact('users'));
    }

    public function destroy( User $user)
    {
        $user->delete ();
        return back()->with('infoDanger', 'Lutilisateur a bien été supprimé .');
    }


}
