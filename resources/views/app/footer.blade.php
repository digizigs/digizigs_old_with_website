<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4>Strategy</h4>
                        <p>When it comes to the success of your website, app or software, strategy is everything. It’s the foundation for your success. It’s do or die.We understand business. That's why we begin every project with a workshop — crafting a one-of-a-kind, unique strategy that is designed to help you win.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4>Our Services</h4>
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
                        <h4>Recent Updates</h4>
                        <div class="media">
                            <a href="#">
                                <img src="{{asset('public\images\web\recent1.jpg')}}" class="d-flex mr-3" alt="">
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
                                <img src="{{asset('public\images\web\recent2.jpg')}}" class="d-flex mr-3" alt="">
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
                                <img src="{{asset('public\images\web\recent3.jpg')}}" class="d-flex mr-3" alt="">
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
                        <h4>Address</h4>
                        <h5>DigiZigs Web Dev.</h5>
                        <p>@ : info@digizigs.com <br>P: (+91) 9712340450</p>
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
                <div class="col-lg-6">
                    <div class="copyright-txt">
                        © 2018 <a href="{{url('/')}}">DigiZigs Web Dev.</a> All Rights Reserved.
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="footer-nav">
                        <a href="#">Home</a>
                        <a href="#">Portfolio</a>
                        <a href="#">Pages</a>
                        <a href="#">Shortcode</a>
                        <a href="#">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> 