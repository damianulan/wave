@extends('auth.master')

@section('content')
<?php
$build = \App\Models\Config::build() ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-8">
            <div class="card m-4">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-lg-block text-center align-self-center px-1 py-0">
                            <img src="{{asset('themes/wave-light/images/icons/logo/png/wave-logo-color-box.png')}}">
                        </div>
                        <div class="col-lg-6 p-0">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-header fs-4">
                                            {{__('auth.login')}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="fs-7 float-right">{{__('auth.admin_panel')}}</div><br/>
                                        <div class="fs-7 float-right">Build: {{$build}}</div>
                                    </div>
                                </div>

                                <div class="divider">
                                    <div class="divider-text">{{config('app.name')}}</div>
                                </div>
                                <div class="alert alert-primary m-0">
                                    <p class="mx-1 mb-0 fs-6">{!! __('messages.demo_login') !!}</p>                                
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('auth.logging') }}">
                                        @csrf
                                        <div class="row p-2 d-flex align-items-right">
                                            <div class="mb-3 input-group form-outline">
                                                <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                <label class="form-label" for="email">{{__('auth.email')}}</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                    
                                            <div class="mb-3 input-group form-outline">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                <label class="form-label" for="password">{{__('auth.password')}}</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                    
                                            <div class="mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                    @if (Route::has('password.request'))
                                                    <a class="" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                                </div>
                                            </div>
                    
                                            <div class="mb-0">
                                                <button type="submit" class="btn btn-primary float-right">
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
            </div>
        </div>
    </div>
</div>
@endsection
