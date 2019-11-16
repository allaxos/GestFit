
@extends('layouts.app')
@section('css')
    <style>
        .fa-check { color: green; }
    </style>
@endsection
@section('content')

<h1>Gestion des utilisateurs (administrateurs en rouge)</h1>
        <div class="table-responsive">
            <table class="table table-dark text-white">
                <thead>
                <tr>
                    <th scope="col">@lang('Nom')</th>
                    <th scope="col">@lang('Email')</th>
                    <th scope="col">@lang('Inscription')</th>
                    <th scope="col">@lang('Vérifié')</th>
                    <th scope="col">@lang('Catégorie')</th>
                    <th scope="col">@lang('nombre de message')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr @if($user->is_admin==1) style="color: red" @endif>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->formatLocalized('%x') }}</td>
                        <td>@if($user->email_verified_at){{ $user->email_verified_at->formatLocalized('%x') }}@endif</td>
                        <td>{{$user->getCategorieOption($user)}}</td>
                        <td>{{(new App\message_users)->getCountMessage($user)}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection

