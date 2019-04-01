
@extends('layouts.admin')

@section('title','Analytics')



@section('content')

  

  <div class="right_col" role="main">

        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> GA - Dashboard <small></small></h3>
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
                          <th style="width:40%;">
                            <p></p>
                          </th>
                          <th>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p class="">Browser</p>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                              <p class="">Sessions</p>
                            </div>
                          </th>
                        </tr>
                        <tr>
                          <td>
                            <canvas id="browser_chart" height="140px;" width="140px;"></canvas>
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

                    <div class="x_content" style="padding: 10px;">
                      <table class="" style="width:100%">
                        <tr>
                          <th style="width:40%;">
                            <p></p>
                          </th>
                          <th>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p class="">Country</p>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                              <p class="">Sessions</p>
                            </div>
                          </th>
                        </tr>
                        <tr>
                          <td>
                            <canvas id="top_countries" height="140px;" width="140px;"></canvas>
                          </td>
                          <td>
                            <table class="tile_info"> 
                                @foreach($top_countries as $tc)                                    
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-{{$tb['browser']}} blue"></i>{{$tc['country']}}</p>
                                      </td>
                                      <td>{{$tc['sessions']}}</td>
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

                <!-- Visitor Type-->  
                <div class="col-md-6 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Visitors <small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content" >
                      <table class="" style="width:100%">
                        <tr>
                          <th style="width:37%;">
                            <p></p>
                          </th>
                          <th>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p class="">Visitors</p>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                              <p class="">Sessions</p>
                            </div>
                          </th>
                        </tr>
                        <tr>
                          <td>
                            <canvas id="visitor_type" height="140px;" width="140px;"></canvas>
                          </td>
                          <td>
                            <table class="tile_info"> 
                                @foreach($visitor_type as $vt)                                    
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-{{$tb['browser']}} blue"></i>{{$vt['type']}}</p>
                                      </td>
                                      <td>{{$vt['sessions']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                          </td>
                        </tr>
                      </table>                 
                    </div>
                  </div>
                </div>
                <!-- Visitor Type -->

                <!-- Top referrer-->  
                <div class="col-md-6 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Referrer<small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content" >
                      <table class="" style="width:100%">
                        <tr>
                          <th style="width:37%;">
                            <p></p>
                          </th>
                          <th>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                              <p class="">Type</p>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                              <p class="">Pageviews</p>
                            </div>
                          </th>
                        </tr>
                        <tr>
                          <td>
                            <canvas id="referrer_type" height="140px;" width="140px;"></canvas>
                          </td>
                          <td>
                            <table class="tile_info"> 
                                @foreach($referrer as $ref)                                    
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-{{$tb['browser']}} blue"></i>{{$ref['url']}}</p>
                                      </td>
                                      <td>{{$ref['pageViews']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                          </td>
                        </tr>
                      </table>                 
                    </div>
                  </div>
                </div>
                <!-- Top referrer-->

                <!-- Top Page Views-->  
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Pageview <small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content" style="padding: 10px;">

                        <table class="countries_list">
                            <thead>
                              <tr>
                                <th >Page Link</th>
                                <th style="text-align: right;">Sessions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($trending as $mvp)                              
                              <tr>                                                                                     
                                <td>{{$mvp['url']}}</td>
                                <td class="fs15 fw700 text-right">{{$mvp['pageViews']}}</td>
                              </tr>
                              @endforeach                               
                            </tbody>
                          </table>                         
                    </div>
                  </div>
                </div>
                <!-- Top Page Views-->

                <!-- Mobile Traffic-->  
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Mobile Traffic <small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content" style="padding: 10px;">

                        <table class="countries_list">
                            <thead>
                              <tr>
                                <th >Device</th>
                                <th >Source</th>
                                <th >Sessions</th>
                                <th >Pageviews</th>
                                <th >Duration</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($mobile_traffic as $mt)                              
                              <tr>                                                                                     
                                <td>{{$mt[0]}}</td>
                                <td>{{$mt[1]}}</td>
                                <td>{{$mt[2]}}</td>
                                <td>{{$mt[3]}}</td>
                                <td>{{$mt[4]}}</td>
                              </tr>
                              @endforeach                               
                            </tbody>
                          </table>                         
                    </div>
                  </div>
                </div>
                <!-- Mobile Traffic-->


                <!-- Browser and Operating System-->  
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Browser and Operating System <small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content" style="padding: 10px;">

                        <table class="countries_list">
                            <thead>
                              <tr>
                                <th >Operating System</th>
                                <th >Operating System Version</th>
                                <th >Browser</th>
                                <th >Browser Version</th>
                                <th >Sessions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($browser_operating_system as $bot)                              
                              <tr>                                                                                     
                                <td>{{$bot[0]}}</td>
                                <td>{{$bot[1]}}</td>
                                <td>{{$bot[2]}}</td>
                                <td>{{$bot[3]}}</td>
                                <td>{{$bot[4]}}</td>
                              </tr>
                              @endforeach                               
                            </tbody>
                          </table>                         
                    </div>
                  </div>
                </div>
                <!-- Browser and Operating System-->

                <!-- Traffic Sources-->  
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                
                    <div class="x_title">
                      <h2>Traffic Sources <small></small></h2>                  
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content" style="padding: 10px;">

                        <table class="countries_list">
                            <thead>
                              <tr>
                                <th >Source</th>
                                <th >Medium</th>
                                <th >Sessions</th>
                                <th >Pageviews</th>
                                <th >Session Durations</th>
                                <th >Exits</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($traffic_source as $ts)                              
                              <tr>                                                                                     
                                <td>{{$ts[0]}}</td>
                                <td>{{$ts[1]}}</td>
                                <td>{{$ts[2]}}</td>
                                <td>{{$ts[3]}}</td>
                                <td>{{$ts[4]}}</td>
                                <td>{{$ts[5]}}</td>
                              </tr>
                              @endforeach                               
                            </tbody>
                          </table>                         
                    </div>
                  </div>
                </div>
                <!-- Traffic Sources-->        








               

                

                

                

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

      //----------Top Browser Graph ----------//browser_chart  
      var top_browser = {!! json_encode($top_browser)!!}
      var tb_len = top_browser.length;
      var tb_data = { browser : [], session :[] };
      for(var i = 0; i < tb_len; i++){
          tb_data.browser.push(top_browser[i].browser);
          tb_data.session.push(top_browser[i].sessions);
      }
      var chart = new Chart ($('#browser_chart'),{
          type : 'doughnut',
          data : {
              labels : tb_data.browser,
              datasets : [
                        {
                          label: "Browsers",
                          backgroundColor: getRandomColorEach(tb_len),
                          borderColor: '#fff',
                          data: tb_data.session,
                        }
                      ]
          },
          options : {
            responsive: true,
            legend : true,
          }
      });

      //----------Mobile_traffic ----------//
      /*var mobile_traffic = {!! json_encode($mobile_traffic['rows'])!!}
      console.log(mobile_traffic);
      var mt_len = mobile_traffic.length;
      var mt_data = { device : [], source :[], session :[], pageview :[], duration :[] };
      for(var i = 0; i < mt_len; i++){
          mt_data.device.push(mobile_traffic[i][0]);
          mt_data.source.push(mobile_traffic[i][1]);
          mt_data.session.push(mobile_traffic[i][2]);
          mt_data.pageview.push(mobile_traffic[i][3]);
          mt_data.duration.push(mobile_traffic[i][4]);
      };
      console.log(mt_data.device);
      var chart = new Chart ($('#mobile_traffic'),{
          type : 'bar',
          data : {
              labels : mt_data.device,
              datasets : [
                        {
                          label: "Sessions",
                          backgroundColor: getRandomColorEach(mt_len),
                          borderColor: '#fff',
                          data: mt_data.session,
                        },
                        {
                          label: "Pageviews",
                          backgroundColor: getRandomColorEach(mt_len),
                          borderColor: '#fff',
                          data: mt_data.pageview,
                        },
                        {
                          label: "Duration",
                          backgroundColor: getRandomColorEach(mt_len),
                          borderColor: '#fff',
                          data: mt_data.duration,
                        }
                      ]
          },
          options : {
            responsive: true,
          }
      });*/


      //----------Top Country Graph ----------//
      var top_countries = {!! json_encode($top_countries) !!}; //visitor_type
      var tc_len = top_countries.length;
      var tc_data = { country : [], session :[] };
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
                          backgroundColor: getRandomColorEach(tc_len),
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
      

      //----------Top Visitor type Graph ----------//
      var visitors_type = {!! json_encode($visitor_type) !!}; //visitor_type
      var v_len = visitors_type.length;
      var v_data = { type : [], session :[] };
      for(var i = 0; i < tc_len; i++){
          v_data.type.push(visitors_type[i].type);
          v_data.session.push(visitors_type[i].sessions);
      }    
      var chart = new Chart ($('#visitor_type'),{
          type : 'doughnut',
          data : {
              labels : v_data.type,
              datasets : [
                        {
                          label: "Visitors",
                          backgroundColor: getRandomColorEach(v_len),
                          borderColor: '#fff',
                          data: v_data.session,
                        }
                      ]
          },
          options : {
            responsive: true,
            legend : true,
          }
      });

      //----------Top referrer type Graph ----------//
      var referrer = {!! json_encode($referrer) !!}; //visitor_type
      var r_len = referrer.length;
      var r_data = { type : [], pageviews :[] };
      for(var i = 0; i < r_len; i++){
          r_data.type.push(referrer[i].url);
          r_data.pageviews.push(referrer[i].pageViews);
      }        
      var chart = new Chart ($('#referrer_type'),{
          type : 'doughnut',
          data : {
              labels : r_data.type,
              datasets : [
                        {
                          label: "Type",
                          backgroundColor: getRandomColorEach(r_len),
                          borderColor: '#fff',
                          data: r_data.pageviews,
                        }
                      ]
          },
          options : {
            responsive: true,
            legend : true,
          }
      });


      




















  </script>
@endsection