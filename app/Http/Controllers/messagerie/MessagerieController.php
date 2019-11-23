<?php

namespace App\Http\Controllers\messagerie;

use App\conversation;
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
        //$countMessageNotRead=$message->getCountMessageNotRead(auth()->user());

        return view('Messagerie.messagerieIndex',compact('countMessageNotRead','listMessagesRecu'));
    }

    public function read($id){
        // changement de l'etat de non lut
        $messageRecu=message_users::find($id);
        if(auth()->user()->id == $messageRecu->fk_user_received){

        $messageRecu->is_read=1;


        // creation nouvelle conversation si pas le cas
        if($messageRecu->conversation_id==0) {
            $conversation = new conversation();
            $conversation->save();
            $messageRecu->conversation_id = $conversation->id;
        }

        $messageRecu->save();

        // chargement de la conversasion
        $conversations=new message_users();
        $conversations=$conversations->getListMessageConversation($messageRecu);

        return view('Messagerie.messagerieAffiche',compact('messageRecu','conversations'));
        }
    }

    public function destroy($id){
        $message_users=message_users::find($id);


        if(auth()->user()->id == $message_users->fk_user_received){
            $message_users->delete();
            return redirect(route('messagerieIndex'))->with('infoDanger', 'Le message a bien été supprimé .');
        }

        return back()->with('infoDanger', 'Vous n\'avez pas les autorisations pour cette action .');
    }

    public function create($id){
        $message=message_users::find($id);
        if(auth()->user()->id == $message->fk_user_received){
        //creation d'un nouvelle connversation si pas le cas
            if($message->conversation_id==0) {
                $conversation = new conversation();
                $conversation->save();
                $message->conversation_id = $conversation->id;
            }
            $conversations=new message_users();
            $conversations=$conversations->getAllListMessageConversation($message);

            return view('Messagerie.messagerieSeeder',compact('message','conversations'));
        }else{
            return ' pas le droit ';
        }

    }


    public function send(Request $request){

        $request->request->set('user_id',auth()->user()->id);
        $data= $request->validate(
            [
                'objet' => 'required|max:50',
                'message' => 'required',
                'user_id' => '',
                'fk_user_received' => 'required',
                'conversation_id' => ''
            ]
        );

        message_users::create($data);
        return redirect(route('messagerieIndex'))->with('infoSuccess', 'Votre message a bien été envoyé .');
    }
}
