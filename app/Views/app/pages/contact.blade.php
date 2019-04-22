@extends('layouts.app')

@section('title', setting('app_name') .' | Contact')



@section('content')

<div class="wrapper">
  
  <!-- start banner Area -->
  <section class="titlebar" style="background: url({{asset('public/images/banner/curve-5.png')}}) no-repeat scroll center center / cover;">
      <h1 class="page-title">
        <span>Contact </span>
        us
      </h1>
      <div id="particles-js">
        
      </div>
  </section>
  <!-- End banner Area -->


  <section class="tag-line">
    <div class="container">
      <h2 class="tag-title">We’d love to hear from you</h2>
      <p class="tag-description">If you have a project and already have a brief or RFP and would like to discuss it with us, then please do call us or email us using the form below.

       <br> 

      If you have a project but haven’t yet put a brief together or would just like to discuss the project outline, in the first instance, please complete our client questionnaire which will help you to answer some of the questions we’d typically ask you if you called. This will help you to prepare and consider the project in a little more detail, and help us to get back to you with a more accurate response.</p>
    </div>
  </section>


  <!-- ***** Newsletter Area Start ***** -->
  <section class="newsletter-area sp-60">
      <div class="container">
          <div class="row align-items-center justify-content-between">
              <!-- Newsletter Content -->
              <div class="col-12 col-md-6 col-lg-6">
                  <div class="nl-content mb-80">
                      <h2>Subscribe to our Newsletter</h2>
                      <p>Subscribe our newsletter to get notification about new updates, etc...</p>
                  </div>
              </div>
              <!-- Newsletter Form -->
              <div class="col-12 col-md-6 col-lg-5">
                  <div class="nl-form mb-80">
                      <form action="{{route('app.subscribe')}}" method="post">
                        @csrf
                          <input type="email" name="email" value="" placeholder="Your Email">
                          <button type="submit">Subscribe</button>
                          @captcha
                      </form>
                  </div>
              </div>
          </div>
          <!-- Border Bottom -->
          <div class="border-line"></div>
      </div>
  </section>
  <!-- ***** Newsletter Area End ***** -->

</div>




@endsection