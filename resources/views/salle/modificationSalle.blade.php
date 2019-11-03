@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold justify-content-center" style="color: white;font-size: 200%"> <i class="far fa-plus-square"></i>  Ajouter une Salle de sport</div>
                    <div class="card-body">
                        <form action="{{route('salleUpdate',$salle->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Titre Salle..." value="{{ old('nom' , $salle->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control  @error('adresse') is-invalid @enderror" name="adresse" id="adresse" placeholder="Adresse..." value="{{ old('adresse',$salle->adresse) }}">
                                @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control  @error('localite_id') is-invalid @enderror" name="localite_id" id="localite_id" >
                                    <option value=''>Localitée :  </option>
                                    @foreach($localites as $localite)
                                        @if ($localite->id==$salle->localite_id)
                                            <option value="{{ $localite->id }}" selected>{{$localite->name}}</option>
                                        @else
                                            <option value="{{ $localite->id }}">{{$localite->name}}</option>
                                        @endif
                                    @endforeach

                                </select>
                                @error('localite_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description..." >{{ old('description',$salle->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success font-weight-bold">Envoyer !</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection