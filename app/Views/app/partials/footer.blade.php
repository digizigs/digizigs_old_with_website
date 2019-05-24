<!--Footer Section-->
<footer class="footer-area relative">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4 class="section-title">Strategy</h4>
                        <p>When it about success of your website, app or software, strategy is everything. We understand the business. That's why we create every project as a workshop — crafting a one-of-a-kind, Our unique strategy that is designed to help you win in this competitive market.We keep you one step ahead of your competitor.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4 class="section-title">Our Services</h4>
                        <ul>
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Web Application Design</a></li>
                            <li><a href="#">Branding & Strategy</a></li>
                            <li><a href="#">Logo & Identity Systems</a></li>
                            <li><a href="#">Social</a></li>
                            <li><a href="#">Front and Backend Web Development</a></li>
                            <li><a href="#">iOS (iPhone & iPad) Development</a></li>
                            <li><a href="#">Android Development</a></li>
                            <li><a href="#">API Integrations</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4 class="section-title">Recent Updates</h4>
                        <div class="media">
                            <a href="#">
                                <img src="{{asset('public/images/blog/post-img1.jpg')}}" class="d-flex mr-3" alt="">
                            </a>
                            <div class="media-body">
                                <h5>
                                    <a href="#">Curling irons are as individual as the women</a>
                                </h5>
                                <span>June 22, 2017</span>
                            </div>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="{{asset('public/images/blog/post-img2.jpg')}}" class="d-flex mr-3" alt="">
                            </a>
                            <div class="media-body">
                                <h5>
                                    <a href="#">Curling irons are as individual as the women</a>
                                </h5>
                                <span>June 22, 2017</span>
                            </div>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="{{asset('public/images/blog/post-img1.jpg')}}" class="d-flex mr-3" alt="">
                            </a>
                            <div class="media-body">
                                <h5>
                                    <a href="#">Curling irons are as individual as the women</a>
                                </h5>
                                <span>June 22, 2017</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4 class="section-title">Contact</h4>

                        <p>DigiZigs Web Technologies.</p>
                        <p>info@digizigs.com <br>P: (+91) 9712340450</p>
                        <h4>Newsletter</h4>


                        @if (Session::has('subscription'))
                            <h4>You are successfully subscribed to our news letter,we will keep you posted</h4>              
                        @else
                            <form action="{{route('app.subscribe')}}" class="nw_form" method="post">
                                {!! csrf_field() !!}
                                <input placeholder="Enter your email" type="email" name="email" >
                                <button><i class="fa fa-paper-plane"></i></button>
                            </form>
                            @if ($errors->count() > 0)
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                        @endif

                        
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-txt" style="text-align: center;">
                        <span>© 2018</span> <a href="{{url('/')}}">DigiZigs Web Technologies.</a> <span>All Rights Reserved.</span>
                    </div>
                </div>
                <!-- <div class="col-lg-6 text-right">
                    <div class="footer-nav">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('/portfolio')}}">Portfolio</a>
                        <a href="#">Pages</a>                     
                        <a href="{{url('/blog')}}">Blog</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</footer> 
<!--Footer Section-->	