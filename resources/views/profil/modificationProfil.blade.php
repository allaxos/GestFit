@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold justify-content-center" style="color: white;font-size: 200%"> <i class="far fa-plus-square"></i>  Données personnelle </div>
                    <div class="card-body">
                        <form action="{{route('profilUpdateData')}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name"  value="{{ old('nom' , auth()->user()->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control  @error('lastName') is-invalid @enderror" name="lastName" id="lastName"  value="{{ old('lastName' , auth()->user()->lastName) }}">
                                @error('lastName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success font-weight-bold"> <i class="fas fa-user-edit"></i> Mettre a jour </button>
                        </form>
                        <hr>
                        <form action="{{route('profilUpdateEmail')}}" method="POST">
                                        @csrf
                                        @method('put')
                            <div class="form-group">
                                <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" id="email"  value="{{ old('email', auth()->user()->email) }}"  >
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success font-weight-bold" onclick="return confirm('Votre nouvelle adresse doit être confirmé, êtes-vous sur ?')"> <i class="fas fa-user-edit"></i> Changer </button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection