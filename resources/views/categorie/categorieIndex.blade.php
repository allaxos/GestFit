@extends('layouts.app')


@section('css')
    <style>
        .fa-check { color: green; }
    </style>
@endsection
@section('content')

    <h1>Gestion des différentes Categorie</h1>
    <div class="table-responsive">
        <table class="table table-dark text-white">
            <thead>
            <tr>
                <th scope="col" style="color: red">@lang('Nom de la categorie')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorie as $cat)

                    <td>{{ $cat->name }}</td>
                    <td>
                            <a type="button" href="{{ route('CategorieDestroy', $cat->id) }}"
                               class="btn btn-danger btn-sm pull-right" onclick="return confirm('êtes vous sure de vouloir supprimer la categorie :?') "data-toggle="tooltip"
                               title="@lang("Supprimer la categorie")"><i class="fas fa-trash fa-lg"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a type="button "href="{{route('CategorieCreate')}}" class="btn btn-secondary my-3">Créer une categorie  </a>
    </div>
@endsection
