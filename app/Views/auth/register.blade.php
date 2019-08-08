@extends('layouts.auth')

@section('title','Register')

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
            
            <form method="POST" action="{{ route('register') }}">
              @csrf
              
              <h5>Sign Up</h5>
              <div>
                <input type="text" class="form-control" placeholder="Name" required="" name="name" autofocus value="{{ old('name') }}"/>
                @if ($errors->has('name'))
                     <span class="help-block">
                         <strong>{{ $errors->first('name') }}</strong>
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
           
         </div>
    
   </div>

</section>
@endsection

