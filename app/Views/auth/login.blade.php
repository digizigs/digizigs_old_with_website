@extends('layouts.auth')

@section('title','Login')

@section('content')

<div class="animate form login_form">
    <section class="login_content">
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <h1>Sign In</h1>

          <div>
            <input type="text" class="form-control" name="email" placeholder="Username" required="" autofocus value="{{ old('email') }}"/>
          </div>

          <div>
            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
          </div>

          <div>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="filled-in chk-col-pink">
            <label for="rememberme">Remember Me</label>
          </div>

          <div>
            <button class="btn btn-default submit btn-sm" style="margin-top: 5px;">Log in</button>
            <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">New to site?
              <a href="{{ route('register') }}" class="to_register"> Create Account </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
               <h1><i class="fa fa-paw"></i> {{setting('app_name')}}</h1>
              <p>©2016 All Rights Reserved</p>
            </div>
          </div>
        </form>
    </section>
</div>

@endsection

