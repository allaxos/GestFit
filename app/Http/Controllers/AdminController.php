<?php

namespace App\Http\Controllers;

use App\message_users;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function destroy( User $user)//l'id de user
    {
        $user->delete ();
        return redirect()->back()->with('success', 'lutilisateur a bien été supprimer');
    }

    public function edit(User $user){

        return view('adminEdit',compact('user'));
    }

    public function updateData(User $user){

        $data=request()->validate([
            'name' => ['required', 'string', 'max:50'],
            'lastName' => ['required', 'string', 'max:50'],
        ]);
        $user->update($data);
        return redirect(route('adminView'))->with('success','lutilisateur a bien été modifier');

    }

}
