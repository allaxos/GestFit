<?php

namespace App\Http\Controllers\admin;

use App\message_users;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        return view('admin.adminIndex');
    }
    public function show(){
        $users=$this->repository->getAll();
        return view('admin.adminView',compact('users'));
    }

    public function destroy( User $user)//l'id de user
    {

        $user->delete ();
        return redirect()->back()->with('success', 'lutilisateur a bien été supprimer');
    }

    public function edit(User $user){

        return view('admin.adminEdit',compact('user'));
    }
    public function create(){
        return view('admin.adminCreate');
    }
    public function store(Request $request){
        $request->request->set('is_admin',1);
        $data= $request->validate([
                'name' => 'required', 'string', 'max:50',
                'lastName' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'categorie' =>'',
                'is_admin'=>'',
                'email_verified_at'=>['nullable'],
                'password' => ['required', 'string', 'min:5', 'confirmed'],
            ]
        );
        User::create([
            'name' => $data['name'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'is_admin'=>$data['is_admin'],
            'email_verified_at'=>$data['email_verified_at'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect(route('adminView'))->with('succes','Ladmin a bien été crerr');
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
