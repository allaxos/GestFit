@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-outline-success btn-lg btn-block" href="#"> <i class="far fa-plus-square"></i> Ajouter une salle </a>
        <hr>
        <div class="row">
        @foreach($salles as $salle)

            <div class="col-sm-6">
                <div class="card" style="padding: 2%;margin: 1%; box-shadow: 5px 5px 10px">
                    <header class="card-header bg-success text-center font-weight-bold" style="color: white;">
                        <h1 class="card-header-title">{{$salle->name}}</h1>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <br>
                            <h5>Date : </h5>
                            <p>{{$salle->created_at->format('d/m/y')}}</p>
                            <hr>
                            <h5>Localitée : </h5>
                            <p> {{$salle->localite->name}}</p>
                            <hr>
                            <h5>Description :</h5>
                            <p>{{$salle->description}}</p>
                            <hr>
                            <div class="d-flex justify-content-around">
                            <a class="btn btn-outline-success" href="{{ route('salle.edit', $salle->id) }}"> <i class="far fa-edit"></i> Modifier</a>
                            <form action="{{ route('salle.destroy', $salle->id) }}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit"> <i class="far fa-edit"></i> Supprimer</button>
                            </form>

                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection