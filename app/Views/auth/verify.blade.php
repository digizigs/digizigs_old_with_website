@extends('layouts.auth')

@section('title','Verify Email')

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

            <div class="verify-email">
                
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                        </div>
                    </div>
                
            </div>
         </div>
    
   </div>

</section>



@endsection
