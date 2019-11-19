@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold justify-content-center" style="color: white;font-size: 200%"> <i class="far fa-plus-square"></i>  Ajouter une categorie</div>
                    <div class="card-body">
                        <form action="{{route('CategorieStore')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Titre de la nouvelle categorie " value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success font-weight-bold">Enregister</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
