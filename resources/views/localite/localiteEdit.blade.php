@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold justify-content-center" style="color: white;font-size: 200%"> <i class="far fa-plus-square"></i>  Modifier la localite de  {{$localite->name }}</div>
                    <div class="card-body">
                        <form action="{{route('LocaliteUpdateData',$localite->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name"  value="{{$localite->name}}">
                                @error('localite')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control  @error('codePostal') is-invalid @enderror" name="codePostal" id="codePostal"  value="{{$localite->codePostal}}">
                                @error('codePostal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success font-weight-bold"> <i class="fas fa-user-edit"></i> Mettre a jour </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
