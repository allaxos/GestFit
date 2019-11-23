<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use App\message_users;
use App\MessageContact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');


    }
    public function create($id){
        $messageContactSend=MessageContact::find($id);
        return view('adminMessageCreate',compact('messageContactSend'));

    }
    //à voir 
    public function send(ContactRequest $request){
        $message=request('message');
        $destinataire=request('fk_user_received');
        $messageContact=new MessageContact();
        $messageContact->name="admin";
        $messageContact->email="GestFitapplication@gmail.com'";
        $messageContact->message=$message;
        $request->request->set('name', $messageContact->name);
        $request->request->set('email', $messageContact->email);
        $request->request->set('message', $messageContact->message);
        $data = $request->validated( [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:900',
        ]);
        MessageContact::create($data);
        Mail::to($destinataire)->send(new Contact($request->except('_token')));
        return view('adminView');
    }
    public function sendtoConfirmUser(Request $request){

        $request->request->set('user_id',auth()->user()->id);


        $data= $request->validate(
            [
                'objet' => 'required|max:50',
                'message' => 'required',
                'user_id' => '',
                'fk_user_received' => 'required'
            ]
        );
        dd($data);
        message_users::create($data);
        return redirect(route('adminView'));
    }

    public function index(){

        $messages=MessageContact::all();

        return view('adminMessageIndex',compact('messages'));
    }

    public function show($id){

        $messageContactSend=MessageContact::find($id);
        return view('adminMessageView',compact('messageContactSend'));
    }

    public function destroy(MessageContact $messageContact){
        $messageContact->delete();
        return redirect()->back()->with('success', 'message a bien été supprimer');
    }


}
