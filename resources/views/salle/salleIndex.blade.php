@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-outline-success btn-lg btn-block font-weight-bold" href="{{route('salleCreate')}}"> <i class="far fa-plus-square"></i> Ajouter une salle </a>
        <hr>

        @if(session()->has('infoDanger'))
            <div class="alert alert-danger text-center " role="alert" style="color: white;">
                {{ session('infoDanger') }}
            </div>
            <br>
        @endif

        @if(session()->has('infoSuccess'))
            <div class="alert alert-success" role="alert">
                {{ session('infoSuccess') }}
            </div>
            <br>
        @endif

        <div class="d-flex justify-content-center">{{$salles->links()}}</div>
        <div class="row">
        @foreach($salles as $salle)

            <div class="col-sm-6">
                <div class="card" style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px">
                    <header class="card-header bg-success text-center " style="color: white;">
                        <h3 class="card-header-title">{{$salle->name}}</h3>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <br>
                            <h5>Date de création : </h5>
                            <p>{{$salle->created_at->format('d/m/y')}}</p>
                            <hr>
                            <h5>Adresse : </h5>
                            <p> {{$salle->adresse}}</p>
                            <p> {{$salle->localite->codePostal}} {{$salle->localite->name}}</p>
                            <hr>
                            <h5>Description :</h5>
                            <p>{{$salle->description}}</p>
                            <hr>
                            <div class="d-flex justify-content-around">
                                <!-- route('salle.edit', $salle->id) }}-->
                            <a class="btn btn-outline-success" href="{{route('salleEdit',$salle->id)}}"> <i class="far fa-edit"></i> Modifier</a>

                            <form action="{{route('salleDestroy', $salle->id) }}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit"> <i class="far fa-trash-alt"></i> Supprimer</button>
                            </form>

                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <br>
        <div class="d-flex justify-content-center " style="color: green">{{$salles->links()}}</div>
    </div>
@endsection