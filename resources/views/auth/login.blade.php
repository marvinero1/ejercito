@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="content" style="height: 100%;">
    @if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
<div class="row" style="height: 100%; margin: 0;">
    <div class="col-md-6 right">
        <div class="login_wrapper">
            <div class="animate form login_form" >
                <section class="login_content login_content-login">
                    <a href="/"><img src="/images/img/login/1.png" alt="logo" width="120px"></a>
                    <br>
                    <div class="pt-3">
                        <p>ESCUELA MILITAR DE SARGENTOS DEL EJERCITO</p>
                        <P>MAXIMILIANO PAREDES TEJERINA</P>  
                    </div>
                    
                    @if(config('auth.users.registration'))
                        <div>
                            <div class="clearfix"></div>
                            <br/>
                            <div><div class="h1">{{ config('app.name') }}</div></div>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Login') }}
                                    </button>
    
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </div>
                            </div>
                        </form> 
                    </div>

                    <div class="card">
                        <div class="card-body" style="color: black !important;">
                            Nota: Ingreso por unica vez en caso de presentar fallas comunicarse con: 77777777
                        </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
    {{-- <img src="../assets/images/icon.png" alt="logo" width="90px"> --}}
    <div class="col-md-6" id="bg-cover-login" style="height: 100%;">
        <div class="bgImgCoverPages"></div>
    </div>
</div>
@endsection

<style>
    .body{
        height: 100%; 
        margin: 0;
    }
    .login{
        background: #093070 !important;
    }
    #bg-cover-login{
        background: url(/images/img/carousel-bg-6.jpg);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        padding: 0;
    }
    a{
        color: white;
    }
    .bgImgCoverPages{
        width: 100%;
        height: 100%;
        position: relative;
        background: rgb(2,0,36);
        background: linear-gradient(0deg, rgba(2,0,36,0.039653361344537785) 2%, rgba(9,48,112,0.37298669467787116) 82%);
    }
    .right{
        color: white;
        text-shadow: 0 1px 0 rgb(9 45 116) !important;
        background: rgb(120,134,107);
background: linear-gradient(180deg, rgba(120,134,107,1) 28%, rgba(120,134,107,0.9579481450783438) 52%, rgba(57,71,44,1) 90%);
    }
    .login_content-login{
        margin: 0 auto;
        padding: 65px 0 50px;
        position: relative;
        text-align: center;
        text-shadow: 0 1px 0 rgba(9,45,116,1) !important;
        min-width: 280px;
    }
</style>

{{-- @section('styles')
    @parent {{ Html::style(mix('assets/auth/css/login.css')) }}
@endsection --}}


