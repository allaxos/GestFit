<?php

namespace App\Http\Controllers\messagerie;

use App\message_users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagerieController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('notAdmin');

    }

    public function index(){

        $listMessagesRecu=message_users::where('fk_user_received',auth()->user()->id)->latest()->paginate(10);

        $message= new message_users();
        $countMessageNotRead=$message->getCountMessageNotRead(auth()->user());

        return view('messagerie.messagerieIndex',compact('countMessageNotRead','listMessagesRecu'));
    }

    public function read($id){
        $messageRecu=message_users::find($id);
        $messageRecu->is_read=1;
        $messageRecu->save();

        return view('messagerie.messagerieAffiche',compact('messageRecu'));
    }

    public function destroy($id){
        $message_users=message_users::find($id);


        if(auth()->user()->id == $message_users->fk_user_received){
            $message_users->delete();
            return back()->with('infoDanger', 'Le message a bien été supprimé .');
        }

        return back()->with('infoDanger', 'Vous n\'avez pas les autorisations pour cette action .');
    }

    public function create($id){

        $message=message_users::find($id);
        return view('messagerie.messagerieSeeder',compact('message'));

    }


    public function send(Request $request){

        $request->request->set('user_id',auth()->user()->id);
        $data= $request->validate(
            [
                'objet' => 'required|max:50',
                'message' => 'required',
                'user_id' => '',
                'fk_user_received' => 'required'
            ]
        );

        message_users::create($data);
        return redirect(route('messagerieIndex'))->with('infoSuccess', 'Votre message a bien été envoyé .');
    }
}
