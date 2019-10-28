<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\MessageContact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function create()
    {
        return view('Contact.contact');
    }

    public function store(ContactRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|between:2,20|alpha',
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:250'
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        MessageContact::create($validator->validate());


        return view('Contact.confirmationContact');
    }
}
