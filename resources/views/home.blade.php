@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if(auth()->user()->email_verified_at == null)
                            <p>email dois etre verifier</p>
                        @else
                            <div class=”panel-heading”>Normal User</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
