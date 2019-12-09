<?php

namespace App\Http\Controllers\annonce;

use App\Annonce;
use App\Salle;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnonceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('auth');
        $this->middleware('notAdmin');
    }

    public function index(){

        session(['title' => 'Annonces : salle de sport en location belgique, salle de sport a louer']);
        session(['description' => 'GesFit : toutes les Annonces de location de salle de sport , terrain de sport et salle de fitness en belgique et premiere site de mise en relation de location de salle de sport et terrain de sport.']);
        $annonces=Annonce::where('user_id',auth()->user()->id)->orderBy('updated_at', 'desc')->paginate(4);

        return view('annonce.annonceIndex',compact('annonces'));
    }

    public function create(){
        $salles=Salle::where('user_id',auth()->user()->id)->get();
        return view('annonce.creationAnnonce',compact('salles'));
    }

    public function store(Request $request){

        $request->request->set('user_id',auth()->user()->id);
        $dateStart=request('timeDebut');
        $dateEnd=request('timeFin');
        $format = 'H:i';
        $newdateDebut = DateTime::createFromFormat($format, $dateStart);
        $newdateFin=DateTime::createFromFormat($format, $dateEnd);
        if($newdateFin<$newdateDebut){
            return redirect()->back()->with('infoDanger', 'heure du fin plus petit que heure début.');
            dd("dateFin plus petit que date debut attention ");
        }
        else {

            //dd("c'est ok");


            $data = $request->validate([
                    'name' => 'bail|required',
                    'prix' => 'required|numeric|between:1,9999',
                    'salle_id' => 'required',
                    'dateLocation' => 'required',
                    'timeDebut' => 'required',
                    'timeFin' => 'required',
                    'description' => 'required|max:900',
                    'user_id' => '',
                ]
            );
            Annonce::create($data);
            $annonces = Annonce::where('user_id', auth()->user()->id)
                ->orderBy('updated_at', 'desc')
                ->paginate(4);

            return view('annonce.annonceIndex', compact('annonces'));
        }

    }


    public function destroy(Annonce $annonce)
    {

        if(auth()->user()->id == $annonce->user_id){
            $annonce->delete();
            return back()->with('infoDanger', 'L\'annonce a bien été supprimé .');
        }

        return back()->with('infoDanger', 'Vous n\'avez pas les autorisations pour cette action .');
    }


    public function edit(Annonce $annonce)
    {

        $salles=Salle::where('user_id',auth()->user()->id)->orderBy('name', 'desc')->get();

        return view('annonce.modificationAnnonce',compact('annonce','salles'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $request->request->set('user_id' ,auth()->user()->id);
        $dateStart=request('timeDebut');
        $dateEnd=request('timeFin');
        $format = 'H:i';
        $newdateDebut = DateTime::createFromFormat($format, $dateStart);
        $newdateFin=DateTime::createFromFormat($format, $dateEnd);
        if($newdateFin<$newdateDebut){
            return redirect()->back()->with('infoDanger', 'heure du fin plus petit que heure début.');
            dd("dateFin plus petit que date debut attention ");
        }
        else {
            $validator = $request->validate([
                'name' => 'bail|required',
                'prix' => 'required|numeric|between:1,9999',
                'salle_id' => 'required',
                'dateLocation' => 'required',
                'timeDebut' => '',
                'timeFin' => '',
                'description' => 'required|max:900',
                'user_id' => '',
            ]);

            if (auth()->user()->id == $annonce->user_id) {
                $annonce->update($validator);
                return redirect(route('annonceIndex'))->with('infoSuccess', 'Le film a bien été modifié');
            }
        }
        return redirect(route('annonceIndex'))->with('infoDanger', 'Vous n\'avez pas les autorisations pour cette action .');
        //
    }


}
