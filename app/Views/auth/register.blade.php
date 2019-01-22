
@extends('layouts.auth')

@section('title','Register')

@section('content')

<div class="animate form login_form">
    <section class="login_content">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
          <h1>Sign Up</h1>
          <div>
            <input type="text" class="form-control" placeholder="First Name" required="" name="firstname" autofocus value="{{ old('firstname') }}"/>
          </div>
          <div>
            <input type="text" class="form-control" placeholder="Last Name" required="" name="lastname" autofocus value="{{ old('lastname') }}"/>
          </div>
          <div>
            <input type="email" class="form-control" placeholder="Email" required="" name="email" autofocus value="{{ old('email') }}"/>
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" required="" name="password" autofocus value="{{ old('password') }}"/>
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Confirm Password" required="" name="password_confirmation" autofocus value="{{ old('firstname') }}" />
          </div>
          <div>
            <button class="btn btn-default submit btn-sm">Register</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Already a member ?
                <a href="{{ route('login') }}" class="to_register"> Log in </a>
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

