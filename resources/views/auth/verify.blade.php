@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="box-shadow: 1px 1px 12px #555; ">
                <div class="card-header">{{ __('Verification del\'adresse Mail :') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, veuillez vérifier votre courrier électronique pour valider votre MAIL ') }}
                        <hr>
                    {{ __('Si vous n\'avez pas reçu l\'email') }}, <a href="{{ route('verification.resend') }}">{{ __('cliquez ici...') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
