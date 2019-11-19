<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use App\MessageContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{



    public function create()
    {
        return view('Contact.contact');
    }

    public function store(ContactRequest $request)
    {
        $validator = $request->validated( [
            'name' => 'bail|required|between:2,20|alpha',
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:900',
        ]);


        MessageContact::create($validator);

        Mail::to('GestFitapplication@gmail.com')
            ->send(new Contact($request->except('_token')));


        return view('Contact.confirmationContact');
    }
}
