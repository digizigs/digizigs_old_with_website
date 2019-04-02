
@extends('layouts.auth')

@section('title','Register')

@section('content')

<div class="animate form login_form">
    <div class="row">
     
      <div class="col-md-12 col-xs-12">
        <section class="login_content">
          <div class="brand-logo" >
            <img src="{{asset('public/images/brand_assets/DZ-Logo Orange-black.png')}}" alt="" style="width: 150px;">                         
          </div>

          <form method="POST" action="{{ route('register') }}">
              @csrf
              
            <h1>Sign Up</h1>
            <div>
              <input type="text" class="form-control" placeholder="First Name" required="" name="firstname" autofocus value="{{ old('firstname') }}"/>
              @if ($errors->has('firstname'))
                   <span class="help-block">
                       <strong>{{ $errors->first('firstname') }}</strong>
                   </span>
               @endif
            </div>
            <div>
              <input type="text" class="form-control" placeholder="Last Name" required="" name="lastname" autofocus value="{{ old('lastname') }}"/>
              @if ($errors->has('lastname'))
                   <span class="help-block">
                       <strong>{{ $errors->first('lastname') }}</strong>
                   </span>
               @endif
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" name="email" autofocus value="{{ old('email') }}"/>
              @if ($errors->has('email'))
                   <span class="help-block">
                       <strong>{{ $errors->first('email') }}</strong>
                   </span>
               @endif
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" name="password" autofocus value="{{ old('password') }}"/>
              @if ($errors->has('password'))
                 <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                 </span>
             @endif
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
              
            </div>
          </form>
        </section>
      </div>
    </div>
</div>
@endsection

