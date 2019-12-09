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
            <div class="row card ">
                <h4  class="card-header bg-outline-dark btn-lg btn-block font-weight-bold" style="font-size: 150%"><i class="far fa-envelope"></i> Message </h4>
                <div class="card-body" >
                    <form action="{{route('messagerieSend')}}" method="POST">
                        @csrf
                        <h5>Destinataire : {{$message->user->name}} {{$message->user->lastName}}</h5><br>
                        <input type="hidden" name="fk_user_received" value="{{$message->user->id}}">
                        <input type="hidden" name="conversation_id" value="{{$message->conversation_id}}">
                        <div class="form-group">
                            <input type="text" class="form-control  @error('objet') is-invalid @enderror" name="objet" id="objet" placeholder="Sujet..." value="{{ old('objet') }}">
                            @error('objet')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control  @error('message') is-invalid @enderror" name="message" id="message" placeholder="Votre message">{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-dark font-weight-bold"><i class="far fa-paper-plane"></i> Envoyer</button>
                    </form>
                </div>
            </div>
                @foreach($conversations as $lastMessage)


                    @if($lastMessage->user->id == $message->user->id)
                        <div class="col-md-8 mr-auto"  style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px ; border-radius: 10px;">
                            <p><b>{{$lastMessage->user->name}} {{$lastMessage->user->lastName}}</b> le : {{$lastMessage->created_at->format('d-m-y') }} à {{$lastMessage->created_at->format('H:i')}}</p>
                            @else
                                <div class="col-md-8 ml-auto"  style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px ; border-radius: 10px;">
                                    <p><b>Vous</b> le : {{$lastMessage->created_at->format('d-m-y') }} à {{$lastMessage->created_at->format('H:i')}}</p>
                                    @endif
                                    <p>Sujet : {{$lastMessage->objet}}</p>
                                    <p>Message :</p>
                                    <p>{{$lastMessage->message}}</p>
                                </div>
                                @endforeach
                        </div>
    </div>
@endsection