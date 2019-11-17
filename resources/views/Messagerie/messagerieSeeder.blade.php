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
                <h4  class="card-header bg-success btn-lg btn-block font-weight-bold" style="color: white;font-size: 200%"><i class="far fa-envelope"></i> Message </h4>
                <div class="card-body">
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
                        <button type="submit" class="btn btn-success font-weight-bold"><i class="far fa-paper-plane"></i> Envoyer</button>
                    </form>
                </div>
            </div>
    </div>
@endsection