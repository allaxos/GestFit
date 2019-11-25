@extends('layouts.app')

@section('content')
    <h1>Créer un admin</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inscription') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('adminStore') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Nom :') }}</label>
                <div class="form-group">
                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nom de l'admin..." required autocomplete="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __(' Prenom  :') }}</label>
                <div class="form-group">
                <input type="text" class="form-control  @error('lastName') is-invalid @enderror" name="lastName" id="lastName" placeholder="prenom de l'admin..."  required autocomplete="lastName">
                @error('lastName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' Addresse E-Mail :') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe :') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer Mot de passe :') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary btn-sm pull-left font-weight-bold"><i class="far fa-paper-plane"></i> Créer un admin</button>
            </div>

        </form>
    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
