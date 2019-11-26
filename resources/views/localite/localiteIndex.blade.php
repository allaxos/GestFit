@extends('layouts.app')


@section('css')
    <style>
        .fa-check { color: green; }
    </style>
@endsection
@section('content')

    <h1>Gestion des différentes Localite</h1>
    <div class="table-responsive">
        <table class="table table-dark text-white">
            <thead>
            <tr>
                <th scope="col" style="color: red">@lang('Nom de la localite')</th>
                <th scope="col" style="color: red">@lang('Numéro du code postal')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($localite as $loc)

                <td>{{ $loc->name }}</td>
                <td>{{ $loc->codePostal }}</td>
                <td>
                    <a type="button" href="{{ route('LocaliteEdit', $loc->id) }}"
                       class="btn btn-warning btn-sm pull-right  " data-toggle="tooltip"
                       title="@lang("Modifier la localite") {{ $loc->name }}"><i
                            class="fas fa-edit fa-lg"></i></a>
                </td>
                <td>
                    <a type="button" href="{{ route('LocaliteDestroy', $loc->id) }}"
                       class="btn btn-danger btn-sm pull-right" onclick="return confirm('êtes vous sure de vouloir supprimer la localite :?') "data-toggle="tooltip"
                       title="@lang("Supprimer la localite")"><i class="fas fa-trash fa-lg"></i></a>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a type="button "href="{{route('LocaliteCreate')}}" class="btn btn-secondary my-3">Créer une localite  </a>
    </div>
@endsection
