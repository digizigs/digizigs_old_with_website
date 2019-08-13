@extends('layouts.auth')

@section('title','Reset Password')

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

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                                       

                        <div class="form-group row">
                           
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-default">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>

            @captcha()
             
         </div>
    
   </div>

</section>
@endsection

