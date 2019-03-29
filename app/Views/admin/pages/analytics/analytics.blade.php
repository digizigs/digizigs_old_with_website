
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
                    <h2>Visit by Country<small></small></h2>                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">                   
                    <div class="col-md-6">
                      <canvas id="myChart" style="height:auto; width: auto; max-height:450px; max-width:450px" aria-label="Analytics Chart" role="img"></canvas>
                    </div>

                  </div>
                </div>
                <!-- Visits -->

                <!-- USers -->  
                <div class="col-md-4">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Browser Usage <small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <table class="" style="width:100%">
                        <tr>
                          <th style="width:37%;">
                            <p>Top 5</p>
                          </th>
                          <th>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p class="">Device</p>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                              <p class="">Progress</p>
                            </div>
                          </th>
                        </tr>
                        <tr>
                          <td>
                            <canvas class="canvasDoughnutdd" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                          </td>
                          <td>
                            <table class="tile_info">
                              <tr>
                                <td>
                                  <p><i class="fa fa-square blue"></i>IOS </p>
                                </td>
                                <td>30%</td>
                              </tr>
                              <tr>
                                <td>
                                  <p><i class="fa fa-square green"></i>Android </p>
                                </td>
                                <td>10%</td>
                              </tr>
                              <tr>
                                <td>
                                  <p><i class="fa fa-square purple"></i>Blackberry </p>
                                </td>
                                <td>20%</td>
                              </tr>
                              <tr>
                                <td>
                                  <p><i class="fa fa-square aero"></i>Symbian </p>
                                </td>
                                <td>15%</td>
                              </tr>
                              <tr>
                                <td>
                                  <p><i class="fa fa-square red"></i>Others </p>
                                </td>
                                <td>30%</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>                 
                    </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script>
      function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function getRandomColorEach(count) {
            var data =[];
            for (var i = 0; i < count; i++) {
                data.push(getRandomColor());
            }
            return data;
        }

        var countries = {!! json_encode($browser) !!};

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: {!! json_encode($browser) !!},
                datasets: [{
                    label: "Countries",
                    backgroundColor: getRandomColorEach(countries.length),
                    borderColor: '#328daa',
                    data: {!! json_encode($session) !!},
                }]
            },

            // Configuration options go here
            options: {
                responsive: true
            }
        });
        // Doughnut chart
        
      if ($('#canvasDoughnutdd').length ){ 
        
        var ctx = document.getElementById("canvasDoughnutdd");
        var data = {
        labels: [
          "Dark Grey",
          "Purple Color",
          "Gray Color",
          "Green Color",
          "Blue Color"
        ],
        datasets: [{
          data: [120, 50, 140, 180, 100],
          backgroundColor: [
          "#455C73",
          "#9B59B6",
          "#BDC3C7",
          "#26B99A",
          "#3498DB"
          ],
          hoverBackgroundColor: [
          "#34495E",
          "#B370CF",
          "#CFD4D8",
          "#36CAAB",
          "#49A9EA"
          ]

        }]
        };

        var canvasDoughnut = new Chart(ctx, {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: data
        });
       
      } 
  </script>
@endsection