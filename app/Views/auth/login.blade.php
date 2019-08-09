@extends('layouts.auth')

@section('title','Login')

@section('content')

<section id="login">
   
   <div class="col-md-8 hidden-xs left">
      
         <img src="https://miro.medium.com/max/2625/1*qAX1633WKgkCBjW-7BICCA.jpeg" alt="">
        
   </div>

   <div class="col-md-4 col-xs-12 right">
     

         <div class="login-content">
            <div class="brand-logo" >
               <a href="{{route('apphome')}}">
                  <img src="{{asset('public/images/brand_assets/DZ-Logo Orange-black.png')}}" alt="" style="width: 150px;">   
               </a>
               
            </div>

            <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <h5>Sign in to your account</h5>
                  <div>
                     <input type="text" class="form-control" name="email" placeholder="Username" required="" autofocus value="{{ old('email') }}"/>
                     @if ($errors->has('email'))
                     <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div>
                     <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                     @if ($errors->has('password'))
                     <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                  </div>
                  
                 

                  <div>
                     <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="filled-in chk-col-pink">
                     <label for="rememberme">Remember Me</label>

                     @if (Route::has('password.request'))
                        <a class="pull-right" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                     @endif
            
                  </div>
                  
                  <div>
                     <button class="btn btn-default submit btn-sm pull-left" style="margin-top: 5px;">Log in</button>
                  </div>
                  <div class="clearfix"></div>
                  <div class="separator">
                     <p class="change_link">New to site?
                        <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                     </p>
                     <div class="clearfix"></div>
                     <br />
                     
                  </div>
                  <p class="info">Your data will not be used outside of www.digizigs.com. By signing up you agree that your statistics may be used anonymously inside www.digizigs.com.</p>
            </form>

             @captcha()
             
         </div>
    
   </div>

</section>
@endsection

