@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('auth.exitPage') }}">
                    @csrf
                    <button id="btn_link" class="btn btn-default btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
@endsection('content')