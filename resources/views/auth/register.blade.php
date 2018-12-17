
@extends('layouts.app')

@section('title','Register')

@section('content')

    <div class="reg-wrapper">
        <div class="col-md-12">
            <div class="row align-items-center">


                <div class="col-md-3 col-xs-10 auth-box">
                    <div class="brand-box">
                        Admin<strong>{{config('app.name')}}</strong>
                    </div>

                    <div class="register-box">
                        <form method="POST" action="{{ route('register') }}">
                             @csrf

                            <div class="msg alt-font">Create New Account</div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <div class="form-line">
                                    <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" placeholder="First Name" required autofocus value="{{ old('firstname') }}" required autofocus>
                                </div>                                
                            </div>
                            @if ($errors->has('firstname'))
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $errors->first('firstname') }}</small>
                                </span>
                            @endif



                            <div class="input-group">

                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" placeholder="Last Name" required autofocus value="{{ old('lastname') }}" required autofocus>
                                </div>
                                
                            </div>
                            @if ($errors->has('lastname'))
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $errors->first('lastname') }}</small>
                                </span>
                            @endif

                            <div class="input-group">

                                <span class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-Mail" required autofocus value="{{ old('email') }}" required autofocus>
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
                                        <small>{{ $errors->first('password') }}</small>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $errors->first('password') }}</small>
                                    </span>
                                @endif
                            </div>

                            <div class="row p-10">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm bg-pink waves-effect btn-login" type="submit">REGISTER</button>
                                </div>
                            </div>

                            <div class="row caption">
                                <div class="col-xs-12">
                                    <small>Already have account ? </small>| <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 



@endsection

