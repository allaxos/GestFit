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
            <div class="col-md-8 mr-auto"  style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px ; border-radius: 10px;">

                        <p>Envoyer par : {{$messageRecu->user->name}} {{$messageRecu->user->lastName}} le : {{$messageRecu->created_at->format('d-m-y') }} à {{$messageRecu->created_at->format('H:i')}}</p>
                        <p>Sujet : {{$messageRecu->objet}}</p>
                        <p>Message :</p>
                        <p>{{$messageRecu->message}}</p>
                        <p style="display: inline">
                            <a class="btn btn-outline-success btn-sm text-success" href="{{route('mesagerieCreate',$messageRecu)}}"><i class="fas fa-reply"></i> Répondre</a>
                            <form method="post" action="{{route('messagerieDelete', $messageRecu->id)}}" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm text-danger" type="submit"><i class="far fa-trash-alt"></i> Supprimer </button>
                            </form>
                        </p>

            </div>

                @foreach($conversations as $lastMessage)


                            @if($lastMessage->user->id == $messageRecu->user->id)
                                <div class="col-md-8 mr-auto"  style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px ; border-radius: 10px;">
                                <p><b>{{$lastMessage->user->name}} {{$lastMessage->user->lastName}}</b> le : {{$lastMessage->created_at->format('d-m-y') }} à {{$lastMessage->created_at->format('H:i')}}</p>
                            @else
                                        <div class="col-md-8 ml-auto"  style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px ; border-radius: 10px;">
                                <p><b>Vous</b> le : {{$lastMessage->created_at->format('d-m-y') }} à {{$lastMessage->created_at->format('H:i')}}</p>
                            @endif
                            <p>Sujet : {{$lastMessage->objet}}</p>
                            <p>Message :</p>
                            <p>{{$lastMessage->message}}</p><hr>
                        </div>
                @endforeach
        </div>
    </div>
@endsection