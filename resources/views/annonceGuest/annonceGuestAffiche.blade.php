@extends('layouts.annonce')

@section('content')
    <div class="container">

        <div class="row">
                <div class="col-sm-8" >
                    <div class="card" style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px">
                        <div class="card-body">
                            {{ session(['annonce'],$annonce)}}
                            <h3 class="card-title">{{$annonce->name}}</h3>
                            <p class="card-text"><b> Ajoutée par :</b> {{$annonce->user->name}} {{$annonce->user->lastName}}   <a class="btn btn-warning" href="{{route('messagerieFirst',$annonce->user->id)}}" >Contacter</a></p>
                            <h4>{{$annonce->prix}} €</h4>
                            <p class="card-text"><b>Pour Le : </b>{{date('d-m-Y',strtotime($annonce->dateLocation))}} de {{date('H:i',strtotime($annonce->timeDebut ))}} à {{date('H:i',strtotime($annonce->timeFin ))}} </p>
                            <p class="card-text"><b> Adresse : </b> {{$annonce->salle->adresse}} <br>{{$annonce->salle->localite->codePostal}} {{$annonce->salle->localite->name}} </p>
                            <p class="card-text"><b>Informations :</b>{{$annonce->description}}</p>
                            <p class="card-text"><b>Salle :</b>{{$annonce->salle->description}}</p>
                            <p class="card-text"><b>Informations :</b>{{$annonce->description}}</p>
                            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                            <hr>
                        </div>
                        @foreach($annonce->image as $image)

                                <div class="card" >
                                    <div class="card-body">
                                        <img class="img-fluid" src="../../../storage/{{$image->image}}" alt="{{$image->description}}" >
                                    </div>
                                </div>

                        @endforeach
                    </div>
                </div>
        </div>

        <div class="row ">

        </div>
    </div>
@endsection