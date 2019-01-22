<!--Contact-->
<section id="contact" style="background: url({{asset('public/images/web/contact/contact-bg.jpg')}});">
    <div id="google-map" class="wow fadeIn" data-latitude="52.365629" data-longitude="4.871331" data-wow-duration="1000ms" data-wow-delay="400ms">
        
    </div>
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
</section><!--/#contact-->