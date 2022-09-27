@extends('auth.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-11 d-flex">
            <div class="card">

                <div class="card-body p-0">
                    <div class="row m-0">
                        <div class="col-lg-6 d-lg-block text-center align-self-center px-1 py-0 bg-light">
                            <img src="{{asset('themes/wave-light/images/pages/graphic-2.png')}}">
                        </div>
                        <div class="col-lg-6 col-12 p-0">
                            <div class="p-4">
                                <div class="card-header">
                                    {{__('auth.login')}}
                                </div>
                                <div class="divider">
                                    <div class="divider-text">Waves</div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row p-2 m-0 d-flex align-items-right">
                                        <div class="row mb-3 input-group">
                                            <div class="col-md-6 form-outline d-inline-block">
                                                <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                <label class="form-label" for="email">{{__('auth.email')}}</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <div class="col-md-6 form-outline">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                <label class="form-label" for="password">{{__('auth.password')}}</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
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
                
                                        <div class="row mb-0">
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                

                                            </div>
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
@endsection
