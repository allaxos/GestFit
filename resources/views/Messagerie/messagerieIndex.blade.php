@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('infoDanger'))
            <div class="alert alert-danger text-center " role="alert" style="color: white;">
                {{ session('infoDanger') }}
            </div>
            <br>
        @endif

        @if(session()->has('infoSuccess'))
            <div class="alert alert-success" role="alert">
                {{ session('infoSuccess') }}
            </div>
            <br>
        @endif


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold" style="color: white;font-size: 200%"><i class="far fa-envelope"></i> Messagerie </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col">Sujet</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listMessagesRecu as $messageRecu)
                                @if($messageRecu->is_read==0)
                                    <tr class="table-info">
                                        @else
                                    <tr>
                                        @endif
                                <td >{{$messageRecu->created_at}}</td>
                                <td>{{$messageRecu->user->name}}</td>
                                <td>{{$messageRecu->objet}}</td>
                                        <td>
                                            <form method="post" action="{{route('messagerieDelete', $messageRecu->id)}}" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm text-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                            <a class="btn btn-outline-success btn-sm text-success"><i class="fas fa-reply"></i></a>
                                        </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <div class="d-flex justify-content-center">{{$listMessagesRecu->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection