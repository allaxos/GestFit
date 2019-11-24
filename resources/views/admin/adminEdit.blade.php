@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold justify-content-center" style="color: white;font-size: 200%"> <i class="far fa-plus-square"></i>  Données personnelle de {{$user->name }}</div>
                    <div class="card-body">
                        <form action="{{route('adminUpdateData',$user->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name"  value="{{ old('name' , $user->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control  @error('lastName') is-invalid @enderror" name="lastName" id="lastName"  value="{{ old('lastName' , $user->lastName) }}">
                                @error('lastName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="admin" name="admin" {{ $user->is_admin ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="noSelect"> @lang('admin')</label>
                                </div>
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
