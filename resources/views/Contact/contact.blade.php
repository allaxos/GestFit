@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row card ">
            <h4  class="card-header bg-primary btn-lg btn-block font-weight-bold" style="color: white;font-size: 200%"">Contactez-Nous</h4>
            <div class="card-body">
                <form action="{{ url('contact') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="nom" placeholder="Votre nom" value="{{ old('nom') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="Votre email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control  @error('message') is-invalid @enderror" name="message" id="message" placeholder="Votre message">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary font-weight-bold">Envoyer !</button>
                </form>
            </div>
        </div>
    </div>
@endsection
