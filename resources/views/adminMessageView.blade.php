@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold" style="color: white;font-size: 200%"><i class="far fa-envelope"></i> Message de : {{$messageContactSend->name}}</div>
                    <div class="card-body">
                        <P> Message reçu le : {{$messageContactSend->created_at->formatLocalized('%x')}}</P>
                        <hr>
                        <p>Envoyer par : {{$messageContactSend->name}}</p>
                        <hr>
                        <h3>Message :</h3>
                        <p>{{$messageContactSend->message}}</p><hr>
                        <p style="display: inline">

                            <a type="button" href="mailto:{{$messageContactSend->email}}" class="btn btn-outline-success btn-sm text-success"><i class="fas fa-reply"></i> Répondre</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
