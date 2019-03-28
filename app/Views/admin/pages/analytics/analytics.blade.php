
@extends('layouts.admin')

@section('title','Analytics')



@section('content')

  

  <div class="right_col" role="main">

        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Google Analytics - Dashboard <small></small></h3>
              </div>
 
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
              
              <div class="clearfix"></div>
                

              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <!-- Pageviews -->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pageviews - Last 7 days vs previous 7 days <small></small></h2>                    
                    <div class="clearfix"></div>
                  </div>                   
                  <div class="x_content">
                    
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div id="chart_plot_01" class="demo-placeholder"></div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Facebook Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Twitter Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Conventional Media</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Bill boards</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>


                  </div>
                </div>
                <!-- Pageviews -->
                
                <!-- Visits -->  
                <div class="x_panel">
                
                  <div class="x_title">
                    <h2>Comparision - Last 7 days vs previous 7 days <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    
                    {{--dd($trending)--}}

                    @foreach($trending as $post)
                        <li><a href="{{ url('/').$post['url'] }}">{{ $post['url'] }}</a>{{ $post['pageViews'] }}</li>
                    @endforeach


                  </div>
                </div>
                <!-- Visits -->

                <!-- USers -->  
                <div class="x_panel">
                
                  <div class="x_title">
                    <h2>Users <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    
                    {{--dd($trending)--}}

                    @foreach($trending as $post)
                        <li><a href="{{ url('/').$post['url'] }}">{{ $post['url'] }}</a>{{ $post['pageViews'] }}</li>
                    @endforeach


                  </div>
                </div>
                <!-- Users -->

                <!-- Organic Search -->  
                <div class="x_panel">
                
                  <div class="x_title">
                    <h2>Organic Search <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    
                    {{--dd($trending)--}}

                    @foreach($trending as $post)
                        <li><a href="{{ url('/').$post['url'] }}">{{ $post['url'] }}</a>{{ $post['pageViews'] }}</li>
                    @endforeach


                  </div>
                </div>
                <!-- Organic Search -->

                <!-- Bounce Rate -->  
                <div class="x_panel">
                
                  <div class="x_title">
                    <h2>Bounce Rate <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    
                    {{--dd($trending)--}}

                    @foreach($trending as $post)
                        <li><a href="{{ url('/').$post['url'] }}">{{ $post['url'] }}</a>{{ $post['pageViews'] }}</li>
                    @endforeach


                  </div>
                </div>
                <!-- Bounce Rate -->

              </div>
            </div>
        </div>
    </div>



    
@endsection


@section('javascript')
  
  <script>
      
  </script>
@endsection