
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row card ">
            <h4  class="card-header bg-success btn-lg btn-block font-weight-bold" style="color: white;font-size: 200%"><i class="far fa-envelope"></i> Message </h4>
            <div class="card-body">

                <form action="{{route('adminMessageSend',$messageContactSend)}}" method="POST">
                    @csrf
                    <h5>Destinataire : {{$messageContactSend->name}}</h5><br>
                    <input type="hidden" name="fk_user_received" value="{{$messageContactSend->email}}">
                    <input type="hidden" name="$id" value="{{$messageContactSend->id}}">
                    <div class="form-group">
                        <label> Objet : </label><input type="text" class="form-control  @error('objet') is-invalid @enderror" name="objet" id="objet" placeholder="Sujet..." value="message de l'admin">
                        @error('objet')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Votre message : </label> <textarea class="form-control  @error('message') is-invalid @enderror" name="message" id="message" placeholder="Votre message"></textarea>
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
