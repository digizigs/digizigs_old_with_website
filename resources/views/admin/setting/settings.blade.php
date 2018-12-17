@extends('layouts.admin')

@section('title','| Settings')



@section('content')
      
      
      <div class="main-content-header box-shadow">
        <div class="row">
          
              
          <div class="col-md-6 col-xs-12 mp-0 alt-font">
            <h4><i class="fa fa-tachometer"></i> <span>Settings</span></h4>
          </div>

        </div>
    </div>
      

    <div class="main-content-body box-shadow">
    
      <form method="post" action="{{ route('admin.settings.store') }}" class="form-horizontal" role="form">
        {!! csrf_field() !!}

      @if(count(config('setting_fields', [])) )
        @foreach(config('setting_fields') as $section => $fields)


             <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="{{ array_get($fields, 'icon', 'glyphicon glyphicon-flash') }}"></i>
                    {{ $fields['title'] }}
                
                </div>

                <div class="panel-body">
                    <p class="text-muted">{{ $fields['desc'] }}</p>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10  col-md-offset-1">
                            @foreach($fields['elements'] as $field) 
                                 @includeIf('admin.setting.fields.' . $field['type'] )
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>


        @endforeach
      @endif

        <div class="row m-b-md">
            <div class="col-md-12">
                <button class="btn-primary btn">
                    Save Settings
                </button>
            </div>
        </div>
    </form>



    </div>
      

    
@endsection