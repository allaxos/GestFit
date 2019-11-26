@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('infoSuccess'))
            <div class="alert alert-primary" role="alert">
                {{ session('infoSuccess') }}
            </div>
            <br>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header btn-lg btn-block" style="font-size: 200%"><i class="far fa-address-card"></i> Mon profil </div>
                    <div class="card-body">
                        <div class=”panel-heading” style="margin: 1% ;"><a href="{{route('profilEdit')}}" class="btn btn-outline-primary btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="fas fa-user-edit"></i> Modifier mes données  </a></div>
                        <div class=”panel-heading” style="margin: 1%;"><a href="{{route('profilRest')}}" class="btn btn-outline-primary btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="fas fa-key"></i> Changer mot de passe</a></div>
                        <div class=”panel-heading” style="margin: 1%;"><a href="{{route('profilContact')}}" class="btn btn-outline-primary btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="far fa-envelope"></i> Contacter l'adminstrateur</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
