@extends('layouts.app')
@section('title', 'TimE is AMOr | REGISTER')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 class="auth-title">{{ __('新規登録') }}</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('message.Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('message.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('message.Birthday') }}</label>
                          <div class="col-md-6">
                            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="1992-01-01" required>
                            @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('message.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('message.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col-sm-6 col-12 offset-sm-4">
                                <button type="submit" class="w-100 btn auth-btn">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
@endsection
