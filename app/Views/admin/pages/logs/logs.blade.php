
@extends('layouts.admin')

@section('title','Logs')



@section('content')

  

  <div class="right_col" role="main">

    <log></log>
       
    <div class="page-title">
      <div class="title_left">
        <h3> App Logs <small></small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">    
      <div class="clearfix"></div>
       
      
      <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">                               
          <div class="x_content log-view">
            {{$data}}
            <div class="col-md-2 col-xs-12">
              @foreach($folders as $folder)
                {{$folder}}
                @if ($current_folder == $folder)
                  @foreach($folder_files as $file)
                    {{$file}}
                  @endforeach
                @endif
              @endforeach
              @foreach($files as $file)
                <ul class="to_do" style="">
                  <li>
                    <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}" class="class=list-group-item @if ($current_file == $file) llv-active @endif">
                      {{$file}}
                    </a>
                  </li>
                </ul>
              @endforeach   
            </div>

            <div class="col-md-10 col-xs-12" >

             <div class="lbl-heading" style="margin-bottom: 10px;">
                @if($current_file)
                  <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                    <span class="fa fa-download"></span> Download file
                  </a>
                  -
                  <a id="clean-log" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                    <span class="fa fa-sync"></span> Clean file
                  </a>
                  -
                  <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                    <span class="fa fa-trash"></span> Delete file
                  </a>
                  @if(count($files) > 1)
                    -
                    <a id="delete-all-log" href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                      <span class="fa fa-trash-alt"></span> Delete all files
                    </a>
                  @endif
                @endif
             </div>

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th >Level</th>
                      <th >Context</th>
                      <th >Date</th>
                      <th class="hidden-xs">Content</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($logs as $key => $log)
                      <tr data-display="stack{{{$key}}}" class="even pointer" >
                       
                          <td class="nowrap text-{{{$log['level_class']}}}" style="width: 50%;">
                            <span class="" aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                          </td>
                          <td class="text">{{$log['context']}}</td>
                          <td class="date">{{{$log['date']}}}</td>
                        
                          
                          <td class="text hidden-xs">
                            @if ($log['stack'])
                              <button type="button"
                                      class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                                      data-display="stack{{{$key}}}">
                                <span class="fa fa-search"></span>
                              </button>
                            @endif
                            {{{$log['text']}}}
                            
                              @if (isset($log['in_file']))
                              <br/>{{{$log['in_file']}}}
                               @endif
                           
                            @if ($log['stack'])
                              <div class="stack" id="stack{{{$key}}}"
                                   style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                              </div>
                            @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>    
            </div> 
          </div>
        </div>

      </div>

    </div>
          
  </div>
    



    
@endsection


@section('javascript')
  
  <script>
    $(document).ready(function () {
      $('.table-container tr').on('click', function () {
        $('#' + $(this).data('display')).toggle();
      });
      /*$('#table-log').DataTable({
        "order": [$('#table-log').data('orderingIndex'), 'desc'],
        "stateSave": true,
        "stateSaveCallback": function (settings, data) {
          window.localStorage.setItem("datatable", JSON.stringify(data));
        },
        "stateLoadCallback": function (settings) {
          var data = JSON.parse(window.localStorage.getItem("datatable"));
          if (data) data.start = 0;
          return data;
        }
      });*/
      $('#delete-log, #clean-log, #delete-all-log').click(function () {
        return confirm('Are you sure?');
      });
    });
  </script>

@endsection