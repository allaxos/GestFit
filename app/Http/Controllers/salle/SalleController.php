<?php

namespace App\Http\Controllers\salle;

use App\Localite;
use App\Salle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $salles=Salle::where('user_id',auth()->user()->id)->orderBy('updated_at', 'desc')->paginate(4);

        return view('salle/salleIndex',compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localites=Localite::all();

        return view('salle.creationSalle',compact('localites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->set('user_id' ,auth()->user()->id);
        $validator = $request->validate( [
            'name' => 'bail|required|between:2,20|alpha',
            'adresse' => 'bail|required',
            'localite_id' => 'required|integer',
            'description' => 'bail|required|max:900',
            'user_id' => ''
        ]);

        Salle::create($validator);

        return redirect(route('salleIndex'))->with('infoSuccess', 'La salle a bien été enregistré.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Salle $salle)
    {

        $localites=Localite::all();
        return view('salle.modificationSalle',compact('salle','localites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salle $salle)
    {
        $request->request->set('user_id' ,auth()->user()->id);
        $validator = $request->validate( [
            'name' => 'bail|required|between:2,20|alpha',
            'adresse' => 'bail|required',
            'localite_id' => 'required|integer',
            'description' => 'bail|required|max:900',
            'user_id' => ''
        ]);
        if(auth()->user()->id == $salle->user_id) {
            $salle->update($validator);
            return redirect(route('salleIndex'))->with('infoSuccess', 'Le film a bien été modifié');
        }

        return back()->with('infoDanger', 'Vous n\'avez pas les autorisations pour cette action .');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salle $salle)
    {

        if(auth()->user()->id == $salle->user_id){
            $salle->delete();
            return back()->with('infoDanger', 'La salle a bien été supprimé .');
        }

        return back()->with('infoDanger', 'Vous n\'avez pas les autorisations pour cette action .');
    }
}
