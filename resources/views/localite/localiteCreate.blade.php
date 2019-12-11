@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-outline-dark btn-lg btn-block font-weight-bold justify-content-center" style="color: white;font-size: 200%"> <i class="far fa-plus-square"></i>  Ajouter une Localite</div>
                    <div class="card-body">
                        <form action="{{route('LocaliteStore')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Titre de la nouvelle Localite " value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control  @error('codePostal') is-invalid @enderror" name="codePostal" id="codePostal" placeholder="Code postal de la nouvelle Localite " value="{{ old('codePostal') }}">
                                @error('codePostal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success font-weight-bold">Créer une Localite</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
