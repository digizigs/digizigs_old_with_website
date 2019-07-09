
@extends('layouts.admin')

@section('title','Analytics')



@section('content')

  

  <div class="right_col" role="main">

    <googleanalytics></googleanalytics>

        <div class="">
            
            <div class="row">
              
              
              <div class="clearfix"></div>
                

              <div class="col-md-12 col-sm-12 col-xs-12">
                
               
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
                                <th >Sessions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($browser_operating_system as $bot)                              
                              <tr>                                                                                     
                                <td>{{$bot[0]}}</td>
                                <td>{{$bot[1]}}</td>
                                <td>{{$bot[2]}}</td>
                                <td>{{$bot[4]}}</td>
                              </tr>
                              @endforeach                               
                            </tbody>
                          </table>                         
                    </div>
                  </div>
                </div>
                <!-- Browser and Operating System-->

                

              </div>
            </div>
        </div>
    </div>



    
@endsection


@section('javascript')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script>
      /*function getRandomColor() {
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
      for(var i = 0; i < v_len; i++){
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


      
















*/



  </script>
@endsection