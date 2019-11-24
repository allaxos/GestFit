@extends('layouts.annonce')

@section('content')
    <div class="container">
        <a class="btn btn-outline-success btn-lg btn-block font-weight-bold" href="#"> <i class="far fa-plus-square"></i> Ajouter une annonce </a>
        <hr>

            @foreach( $users as $user)
                {{$user->id}}
                {{$user->name}}
                {{$user->lastName}}

            @endforeach

        </div>
        <br>

    </div>
@endsection