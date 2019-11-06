@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold justify-content-center" style="color: white;font-size: 200%"> <i class="far fa-plus-square"></i>  Ajouter une Salle de sport</div>
                    <div class="card-body">
                        <form action="{{route('salleStore')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Titre Salle..." value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control  @error('adresse') is-invalid @enderror" name="adresse" id="adresse" placeholder="Adresse..." value="{{ old('adresse') }}">
                                @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <select class="form-control  @error('localite_id') is-invalid @enderror" name="localite_id" id="localite_id" >
                                <option  value=''>Localitée :  </option>
                            @foreach($localites as $localite)
                                    <option value="{{ $localite->id }}">{{$localite->name}}</option>
                                @endforeach

                            </select>
                            @error('localite_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description...">{{ old('description') }}</textarea>
                                @error('description')
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