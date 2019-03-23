@extends('layouts.app')

@section('title','Leading Web Design and Devlopment Agency')



@section('content')

<div class="wrapper">
  
  <!-- start banner Area -->
  <section class="titlebar" style="background: url({{asset('public/images/banner/curve-5.png')}}) no-repeat scroll center center / cover;">
      <h1 class="page-title">
        <span>Contact </span>
        us
      </h1>
      <div id="particles-js"></div>
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

</div>


@endsection