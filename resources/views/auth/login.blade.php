@extends('layouts.app')

@section('title','Login')

@section('content')

    <div class="login-wrapper">
        <div class="col-md-12">
            <div class="row align-items-center">
            
                <div class="container error-box ">
                    <div class="col-md-8 col-md-offset-2 ">
                        <div class="msg">
                           
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-10 auth-box">
                    <div class="brand-box">
                        Admin<strong>{{config('app.name')}}</strong>
                    </div>
                    <div class="login-box ">
                        <form id="sign_in" method="POST" action="{{ route('login') }}">
                             @csrf
                            
                        
                            <div class="msg alt-font">Sign in to start your session</div>

                            <div class="input-group">

                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Username / Email / Mobile Number" required autofocus value="{{ old('email') }}" required autofocus>
                                </div>
                                
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $errors->first('email') }}</small>
                                </span>
                            @endif

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


                            </div>

                            <div class="row p-10">
                                <div class="col-xs-8 p-t-5">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="filled-in chk-col-pink">
                                    <label for="rememberme">Remember Me</label>
                                </div>
                                <div class="col-xs-4">
                                    <button class="btn btn-sm bg-pink waves-effect btn-login" type="submit">SIGN IN</button>
                                </div>
                            </div>

                            <div class="row caption">
                                <div class="col-xs-6">
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                                <div class="col-xs-6 align-right">
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div> 

@endsection

