<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //

    public function create($id){

        $listeImage= Image::where('annonce_id',$id)->get();

        return view('annonce.creationImage')->with('id',$id)->with('images',$listeImage);

    }

    public function store(Request $request){

        $data=$request->validate(
            [
                'description' => 'required',
                'image' => 'sometimes|image|max:8000',
                'annonce_id' => 'required',
            ]
        );

        $data['image']=request('image')->storeAs('public/images',$data['description'].'-'.$data['annonce_id'].'.jpeg');
        Image::create($data);

        $listeImage= Image::where('annonce_id',$data['annonce_id'])->get();

        return back()->with('images',$listeImage)->with('infoSuccess','Votre image a été bien enregister ');
    }

    public function destroy(Image $image)
    {

        if(auth()->user()->id == $image->annonce->user->id){
            $image->delete();
            return back()->with('infoDanger', 'L\'image a bien été supprimé .');
        }

        return back()->with('infoDanger', 'Vous n\'avez pas les autorisations pour cette action .');
    }



}
