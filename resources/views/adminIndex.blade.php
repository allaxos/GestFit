@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold" style="color: white;font-size: 200%"><i class="fas fa-chalkboard-teacher"></i> Tableau de bord ADMIN</div>
                    <div class="card-body">
                        <div class=”panel-heading” style="margin: 1%;"><a href="{{route('adminView')}}" class="btn btn-outline-success btn-lg btn-block font-weight-bold" style="font-size: 200%;"><i class="fas fa-warehouse"></i> Gérer les utilisateur</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
