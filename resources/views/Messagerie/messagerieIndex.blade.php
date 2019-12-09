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
                    <div class="card-header bg-outline-dark btn-lg btn-block font-weight-bold" style="font-size: 150%"><i class="far fa-envelope"></i> Messagerie </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listMessagesRecu as $messageRecu)
                                @if($messageRecu->is_read==0)
                                    <tr class="font-weight-bold text-primary">
                                        @else
                                    <tr class="font-weight-light">
                                        @endif
                                <td>{{$messageRecu->created_at->format('d-m-y')}}</td>
                                <td>{{$messageRecu->user->name}} {{$messageRecu->user->lastName}}</td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-sm text-primary" href="{{route('messagerieShow',$messageRecu)}}" style="display: inline-block"><i class="fab fa-readme"></i></a>
                                        </td>
                                        <td >
                                            <a class="btn btn-outline-success btn-sm text-success" href="{{route('mesagerieCreate',$messageRecu)}}" style="display: inline-block"><i class="fas fa-reply"></i></a>
                                        </td>
                                        <td >
                                            <form method="post" action="{{route('messagerieDelete', $messageRecu->id)}}" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm text-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                                            </form>
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