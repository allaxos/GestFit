<?php

namespace App\Http\Controllers\messagerie;

use App\message_users;
use App\MessageContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagerieController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(){

        $listMessagesRecu=message_users::where('fk_user_received',auth()->user()->id)->latest()->paginate(10);

        $message= new message_users();
        $countMessageNotRead=$message->getCountMessageNotRead(auth()->user());

        return view('messagerie.messagerieIndex',compact('countMessageNotRead','listMessagesRecu'));
    }

    public function destroy($id){
        $message_users=message_users::find($id);


        if(auth()->user()->id == $message_users->fk_user_received){
            $message_users->delete();
            return back()->with('infoDanger', 'Le message a bien été supprimé .');
        }

        return back()->with('infoDanger', 'Vous n\'avez pas les autorisations pour cette action .');
    }

}
