<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //

    public function create($id){

        return view('annonce.creationImage')->with('id',$id);

    }

    public function store(Request $request){

        $data=$request->validate(
            [
                'description' => 'required',
                'image' => 'sometimes|image|max:8000',
                'annonce_id' => 'required',
            ]
        );
        $data['image']=request('image')->store('images','public');
        Image::create($data);

    }
}
