@extends('layouts.auth')

@section('title','Activate Account')

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

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-warning" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('resendEmailVerification') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-default">
                            {{ __('Send Activation Link') }}
                        </button>
                    </div>
                </div>
            </form>

             @captcha()
             
         </div>
    
   </div>

</section>
@endsection

