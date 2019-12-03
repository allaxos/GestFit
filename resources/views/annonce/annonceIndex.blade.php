@extends('layouts.annonce')

@section('content')
    <div class="container">
        <a class="btn btn-outline-success btn-lg btn-block font-weight-bold" href="{{route('annonceCreate')}}"> <i class="far fa-plus-square"></i> Ajouter une annonce </a>
        <hr>
        <div class="d-flex justify-content-center " style="color: green">{{$annonces->links()}}</div>
        <div class="row">
        @foreach($annonces as $annonce)
            <div class="col-sm-6" >
                <div class="card" style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px">
                    <div class="card-body">
                        <h3 class="card-title">{{$annonce->name}}</h3>
                        <p class="card-text"><b> Ajoutée par :</b> {{$annonce->user->name}} {{$annonce->user->lastName}}  </p>
                        <h4>{{$annonce->prix}} €</h4>
                        <p class="card-text"><b>Pour Le : </b>{{date('d-m-Y',strtotime($annonce->dateLocation))}} de {{date('H:i',strtotime($annonce->timeDebut ))}} à {{date('H:i',strtotime($annonce->timeFin ))}} </p>
                        <p class="card-text"><b> Adresse : </b> {{$annonce->salle->adresse}} <br>{{$annonce->salle->localite->codePostal}} {{$annonce->salle->localite->name}} </p>
                        <p class="card-text"><b>Salle :</b>{{$annonce->salle->name}}</p>
                        <p class="card-text"><b></b>{{$annonce->salle->description}}</p>
                        <p class="card-text"><b>Informations :</b>{{$annonce->description}}</p>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                        <hr>
                        <a class="btn btn-success" href="{{route('imageCreate',$annonce->id)}}"> Ajouter une photo </a>
                        <a class="btn btn-outline-warning" href="{{route('annonceEdit',$annonce->id)}}"> <i class="far fa-edit"></i> Modifier</a>


                        <form action="{{route('annonceDestroy', $annonce->id ) }}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Toutes les images liée a l\'annonce vont être supprimé, êtes-vous sur ?')"> <i class="far fa-trash-alt"></i> Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>

        @endforeach
        </div>

        <br>
        <div class="d-flex justify-content-center " style="color: green">{{$annonces->links()}}</div>
    </div>
@endsection