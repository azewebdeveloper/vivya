@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if(session('status'))
                        <div class="alert alert-primary">
                            {{session('status')}}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="register-main">
                            <div class="col-md-12 account-left">
                                <input style="width: 100% !important;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ad" type="text" tabindex="1" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" type="email" tabindex="2" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 account-left">
                                <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Şifrə" type="password" tabindex="3" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="password-confirm" type="password" placeholder="Şifrə (təkrar)" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="address submit text-center">
                            <button style="background: #31e431;border: none;padding: 5px 30px 5px 30px;border-radius: 5px;color: white;" type="submit">Əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
