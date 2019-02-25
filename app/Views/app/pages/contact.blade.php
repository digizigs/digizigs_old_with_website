@extends('layouts.app')

@section('title','Leading Web Design and Devlopment Agency')



@section('content')

<section class="contact-page">
	
	<div class="contact-us">
		<div class="contact-content">
			<div class="banner" style="height: 300px; background-image: url({{asset('/public/web/images/contact-banner_2.jpg')}})">
				<h1><span>Contact</span></h1>
			</div>		
			<div class="content-area">
				<h2 class="csc-firstHeader">We’d love to hear from you</h2>
				<p class="alignCentre">If you have a project and already have a brief or RFP and would like to discuss it with us, then please do call us or email us using the form below.</p> 
					<p class="alignCentre">If you have a project but haven’t yet put a brief together or would just like to discuss the project outline, in the first instance, 
						<a href="/client-questionnaire/">please complete our client questionnaire</a> 
					which will help you to answer some of the questions we’d typically ask you if you called. This will help you to prepare and consider the project in a little more detail, and help us to get back to you with a more accurate response.
				</p>
			</div>
		</div> 
	</div>
	

	<div class="contact-form-area">
		<div class="content">
			  <div id="contact-us" class="parallax" >
            <div class="container">
                <div class="row">
                  <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <h2>Contact Us</h2>
                    <p>Let drop a line to us & we will be in touch soon.</p>
                  </div>
                </div>
                <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                  <div class="row">

                    <div class="col-sm-12">
                      <form id="main-contact-form" name="contact-form" method="post" action="{{route('app.inquiry')}}">
                        @csrf
                        <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="test" name="contact" class="form-control" placeholder="Contact Number" required="required">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                        </div>
                        <div class="form-group">
                          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
                        </div>                        
                        <div class="form-group">
                          <button type="submit" class="btn-submit form-control">Send Now</button>
                        </div>
                      </form>   
                    </div>
                   

                  </div>
                </div>
            </div>
        </div>    
		</div>
	</div>

</section>


@endsection