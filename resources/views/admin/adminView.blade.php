
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
                    <th scope="col">@lang('Prenom')</th>
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
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/y') }}</td>
                        <td>@if($user->email_verified_at){{ $user->email_verified_at->formatLocalized('%x') }}@endif</td>
                        <td>{{$user->getCategorieOption($user)}}</td>
                        <td>{{(new App\message_users)->getCountMessage($user)}}</td>

                        <td>
                            <a type="button" href="{{ route('adminEdit', $user->id) }}"
                               class="btn btn-warning btn-sm pull-right  " data-toggle="tooltip"
                               title="@lang("Modifier l'utilisateur") {{ $user->name }}"><i
                                    class="fas fa-edit fa-lg"></i></a>
                        </td>
                        <td>
                            @if($user->is_admin==0)
                            <a type="button" href="{{ route('adminDestroy', $user->id) }}"
                               class="btn btn-danger btn-sm pull-right" onclick="return confirm('êtes vous sure de vouloir supprimer lutilisateur :?') "data-toggle="tooltip"
                               title="@lang("Supprimer l'utilisateur") {{ $user->name }}"><i class="fas fa-trash fa-lg"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a type="button" href="{{route('adminCreate')}}"
               class="btn btn-primary btn-sm pull-right"><i></i>Créer un utilisateur </a>
        </div>
@endsection

