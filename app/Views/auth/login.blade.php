@extends('layouts.auth')

@section('title','Login')

@section('content')

<section id="login">
   
   <div class="col-md-9 hidden-xs left">
      
         <img src="https://miro.medium.com/max/2625/1*qAX1633WKgkCBjW-7BICCA.jpeg" alt="">
        
   </div>

   <div class="col-md-3 col-xs-12 right">
         
         @if (session('error'))
            <div class="status-check">
               <div class="alert alert-warning" role="alert">
                  Your account is InActive,Please check your email for activation link or <a href="{{ route('activationLink') }}">Click here</a> for fresh activation link
               </div>
            </div>
         @endif

         @if (session('expired'))
            <div class="status-check">
               <div class="alert alert-warning" role="alert">
                  This link is expired ! Please <a href="{{ route('activationLink') }}">Click here</a> for fresh activation link
               </div>
            </div>
         @endif

         @if (session('success'))
            <div class="status-check">
               <div class="alert alert-success" role="alert">
                  {{session('success')}}
               </div>
            </div>
         @endif

         @if (session('verified'))
            <div class="status-check">
               <div class="alert alert-success" role="alert">
                  {{session('verified')}}
               </div>
            </div>
         @endif


         <div class="login-content">
            <div class="brand-logo" >
               <a href="{{route('apphome')}}">
                  <img src="{{asset('public/images/brand_assets/DZ-Logo Orange-black.png')}}" alt="" style="width: 150px;">   
               </a>
               
            </div>

            <form method="POST" action="{{ route('login') }}">
                  @csrf
						<h5 class="info-title">Sign in to your account</h5>
						
                  <div>
							<label for="email">Email Address</label>
                     <input type="text" class="form-control" name="email" placeholder="yourname@yourdomain.com" required="" autofocus value="{{ old('email') }}"/>
                     @if ($errors->has('email'))
                     <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                     </span>
                     @endif
						</div>
						
                  <div>
							<label for="password">Password</label>
                     <input type="password" class="form-control" name="password" placeholder="Enter your password" required="" />
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
                        <a class="pull-right" href="{{ route('resetPassword') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                     @endif
            
                  </div>
                  
                  <div>
                     <button class="btn btn-default btn-login submit btn-sm pull-left form-control" style="margin-top: 5px;">Sign In</button>
						</div>
						
            </form>

                  <!--h5 class="divider-text line razor">OR</h5>

                  <div>
                     <a href="" class="btn btn-default btn-google submit btn-sm pull-left form-control" >Sign In with Google</a>
                  </div-->

                  <div class="clearfix"></div>
                  <div class="separator">
                     <p class="change_link">New to site?
                        <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                     </p>
                     <div class="clearfix"></div>
                     <br />
                     
                  </div>
                  <p class="info">Your data will not be used outside of digizigs. By signing up you agree that your statistics may be used anonymously inside www.digizigs.com.</p>
            

             @captcha()
             
         </div>
    
   </div>

</section>
@endsection

