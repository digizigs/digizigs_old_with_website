@extends('layouts.admin')

@section('title','| All Post')



@section('content')

	
    <div class="main-content-header box-shadow">
        <div class="row">
          
              
          <div class="col-md-6 col-xs-12 mp-0 alt-font">
            <h4><i class="fa fa-tachometer"></i> <span>Posts</span></h4>
          </div>

          <div class="col-md-6 col-xs-12 mp-0 hidden-xs">
            <ul class="breadcrumb pull-right">
              <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> </a></li>
              <?php $segments = ''; ?>
              @for($i = 2; $i <= count(Request::segments()); $i++)
                <li>
                   <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
                      {{strtoupper(Request::segment($i))}}
                   </a>
                </li>
             @endfor
            </ul>
          </div>

       
         
        </div>
    </div>
      

    <div class="main-content-body box-shadow">
      
      Body
      
    </div>


    
@endsection