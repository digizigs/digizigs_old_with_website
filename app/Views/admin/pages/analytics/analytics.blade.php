
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

                

                <!-- Top Browser-->  
                <div class="col-md-6 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Top Browser <small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content" style="padding: 10px;">
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
                            <canvas id="myChart" height="140px;" width="140px;"></canvas>
                          </td>
                          <td>
                            <table class="tile_info"> 
                                @foreach($top_browser as $tb)                                    
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-{{$tb['browser']}} blue"></i>{{$tb['browser']}}</p>
                                      </td>
                                      <td>{{$tb['sessions']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                          </td>
                        </tr>
                      </table>                 
                    </div>
                  </div>
                </div>
                <!-- Top Browser -->

                <!-- Top Countries-->  
                <div class="col-md-6 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Top Countries <small></small></h2>                  
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
                            <canvas id="top_countries" height="140px;" width="140px;"></canvas>
                          </td>
                          <td>
                            <table class="tile_info"> 
                                @foreach($top_browser as $tb)                                    
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-{{$tb['browser']}} blue"></i>{{$tb['browser']}}</p>
                                      </td>
                                      <td>{{$tb['sessions']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                          </td>
                        </tr>
                      </table>                 
                    </div>
                  </div>
                </div>
                <!-- Top Countries -->

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>Visits by Country</h2>
                    
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div style="width: 80%; height: 480px;margin: 0 auto;">
                        <canvas class="my_chart"  id="my_chart" ></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>Device Usage</h2>
                    
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
                            <canvas  class="browser_graph" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
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

                <!-- User type-->  
                <div class="col-md-6 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Top Users <small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <table class="" style="width:100%">
                        
                        <tr>
                          <td>
                            <canvas id="user_chart"  aria-label="Analytics Chart" role="img"></canvas>
                          </td>
                          <td>
                            <table class="tile_info"> 
                                @foreach($visitor_type as $user)                                    
                                    <tr>
                                      <td>
                                        <p><i class=""></i>{{$user['type']}}</p>
                                      </td>
                                      <td>{{$user['sessions']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                          </td>
                        </tr>
                      </table>                 
                    </div>
                  </div>
                </div>
                <!-- User type -->

                
                <!-- Visits -->  
                <div class="x_panel">
                
                  <div class="x_title">
                    <h2>Visit by Country<small></small></h2>                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">                   
                    <div class="col-md-6">
                      <!--canvas id="myChart" style="height:auto; width: auto; max-height:450px; max-width:450px" aria-label="Analytics Chart" role="img"></canvas-->
                    </div>

                  </div>
                </div>
                <!-- Visits -->

                

                

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

        var browser = {!! json_encode($browser) !!};

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: {!! json_encode($browser) !!},
                datasets: [{
                    label: "Countries",
                    backgroundColor: getRandomColorEach(browser.length),
                    borderColor: '#fff',
                    data: {!! json_encode($session) !!},
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                legend : false,
            }
        });
        // Doughnut chart

      //----------Top Country Graph ----------//
      var top_countries = {!! json_encode($top_countries) !!}; //top_countries.length;
      var tc_len = top_countries.length;
      var tc_data = { country : [], session :[] };
      var country = [];
      for(var i = 0; i < tc_len; i++){
          tc_data.country.push(top_countries[i].country);
          tc_data.session.push(top_countries[i].sessions);
      }
      var chart = new Chart ($('#top_countries'),{
          type : 'doughnut',
          data : {
              labels : tc_data.country,
              datasets : [
                        {
                          label: "Countries",
                          backgroundColor: getRandomColorEach(browser.length),
                          borderColor: '#fff',
                          data: tc_data.session,
                        }
                      ]
          },
          options : {
            responsive: true,
            legend : true,
          }
      });
      




      //----------my_chart----------------//
      //var ctx = ;
      var data = {
          labels : ["sssss","2","3","4"],
          datasets : [
            {
              label : "India",
              data : ["10","15","20","30"],
              backgroundColor : "blue",
              borderColor : "lightblue",
              fill : false,
              lineTension : 0,
              pointRadius : 5
            },
            {
              label : "Spain",
              data : ["15","34","25","10"],
              backgroundColor : "green",
              borderColor : "lightgreen",
              fill : false,
              lineTension : 0,
              pointRadius : 5
            }
          ]
      };
      var chart = new Chart($('#my_chart'), {
          type: "bar",
          data: {
                labels : ["sssss","2","3","4"],
                datasets : [
                    {
                      label : "India",
                      data : ["10","15","20","30"],
                      backgroundColor : "blue",
                      borderColor : "lightblue",
                      fill : false,
                      lineTension : 0,
                      pointRadius : 5
                    }
                  ]
                },
          options: {}

      });




















  </script>
@endsection