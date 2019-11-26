@extends('layouts.app')


@section('css')
    <style>
        .fa-check { color: green; }
    </style>
@endsection
@section('content')

    <h1>Gestion des différent message </h1>
    <div class="table-responsive">
        <table class="table table-dark text-white">
            <thead>
            <tr>
                <th scope="col" style="color: red">@lang('nom')</th>
                <th scope="col">@lang('Email')</th>
                <th scope="col">@lang('Date denvoye')</th>
                <th scope="col">@lang('Voir le message')</th>
                <th scope="col">@lang('Supprimer le message')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr>
                <td><a href="{{ route('adminMessageView', $message->id) }}">{{$message->name}}</a></td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->created_at->format('d/m/y  H:m') }}</td>
                <td>
                    <a type="button" href="{{ route('adminMessageView', $message->id) }}"
                       class="btn btn-warning btn-sm pull-right  " data-toggle="tooltip"
                       title="@lang("voir le message")"><i
                            class="fas fa-edit fa-lg"></i></a>
                </td>

                <td>
                    <a type="button" href="{{ route('adminMessageViewDestroy', $message->id) }}"
                       class="btn btn-danger btn-sm pull-right" onclick="return confirm('êtes vous sure de vouloir supprimer le message ?') "data-toggle="tooltip"
                       title="@lang("Supprimer le message ")"><i class="fas fa-trash fa-lg"></i></a>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
