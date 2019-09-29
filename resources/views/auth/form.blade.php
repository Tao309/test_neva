@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login by phone number</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('auth.loginByPhone') }}" id="authByPhoneForm">
                            @csrf

                            <div class="form-group row row-phone">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus maxlength="11">

                                    <span class="invalid-phone" role="alert"></span>
                                </div>
                            </div>

                            <div class="form-group row row-password hidden">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control" name="password" autofocus maxlength="11">

                                    <span class="invalid-password" role="alert"></span>
                                </div>
                            </div>

                            <div class="form-group row mb-0 row-submit">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')