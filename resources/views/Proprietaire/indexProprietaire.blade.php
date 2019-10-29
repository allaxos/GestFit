@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold" style="color: white;font-size: 200%"><i class="fas fa-chalkboard-teacher"></i> Tableau de bord</div>
                    <div class="card-body">
                        <div class=”panel-heading” style="margin: 1% ;"><a href="#" class="btn btn-outline-success btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="far fa-address-card"></i> Mon profit </a></div>
                        <div class=”panel-heading” style="margin: 1%;"><a href="#" class="btn btn-outline-success btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="far fa-envelope"></i> Messagerie</a></div>
                        <div class=”panel-heading” style="margin: 1%;"><a href="#" class="btn btn-outline-success btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="far fa-newspaper"></i> Mes annonces</a></div>
                        <div class=”panel-heading” style="margin: 1%;"><a href="#" class="btn btn-outline-success btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="far fa-plus-square"></i> Ajouter une annonce</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
