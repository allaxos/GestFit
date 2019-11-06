@extends('layouts.app')

@section('content')
    <div class="container">
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


        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold" style="color: white;font-size: 200%"><i class="far fa-envelope"></i> Messagerie </div>
                    <div class="card-body">

                        <P> Message reçu le : {{$messageRecu->created_at}}</P>
                        <p>Envoyer par : {{$messageRecu->user->name}} {{$messageRecu->user->lastName}}</p>
                        <p><h3>Sujet :</h3><p> {{$messageRecu->objet}}</p>
                        <p>Message :</p>
                        <p>{{$messageRecu->message}}</p><hr>
                        <p style="display: inline">
                            <a class="btn btn-outline-success btn-sm text-success" href="{{route('mesagerieCreate',$messageRecu)}}"><i class="fas fa-reply"></i> Répondre</a>
                            <form method="post" action="{{route('messagerieDelete', $messageRecu->id)}}" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm text-danger" type="submit"><i class="far fa-trash-alt"></i> Supprimer </button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection