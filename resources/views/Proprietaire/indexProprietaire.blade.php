@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-bark btn-bark btn-block font-weight-bold" style="font-size: 150%"><i class="fas fa-chalkboard-teacher"></i> Tableau de bord</div>
                    <div class="card-body">
                        <div class=”panel-heading” style="margin: 1%;"><a href="{{route('profilIndex')}}" class="btn btn-outline-dark btn-lg btn-block font-weight-bold" style="font-size: 150%;"><i class="far fa-address-card"></i> Mon profil </a></div>
                        <div class=”panel-heading” style="margin: 1%;"><a href="{{route('messagerieIndex')}}" class="btn btn-outline-dark btn-lg btn-block font-weight-bold" style="font-size: 150%;"><i class="far fa-envelope"></i> Messagerie ({{$countMessageNotRead}})</a></div>
                        <div class=”panel-heading” style="margin: 1%;"><a href="{{route('annonceIndex')}}" class="btn btn-outline-dark btn-lg btn-block font-weight-bold" style="font-size: 150%;"><i class="far fa-newspaper"></i> Mes annonces</a></div>
                        <div class=”panel-heading” style="margin: 1%;"><a href="{{route('salleIndex')}}" class="btn btn-outline-dark btn-lg btn-block font-weight-bold" style="font-size: 150%;"><i class="fas fa-warehouse"></i> Mes salles</a></div>
                        <!-- <div class=”panel-heading” style="margin: 1%;"><a href="#" class="btn btn-outline-success btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="far fa-plus-square"></i> Ajouter une annonce</a></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
