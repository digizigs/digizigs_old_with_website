
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

<div class="right_col" role="main">
                                 
  <div class="row">
    

    

    	<div class="clearfix"></div>

      @if(Session::has('message'))
        <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
      @endif

      @if(Session::has('deleted'))
        <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
      @endif

    	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">	                   
            <a href="{{route('page.create')}}" class="btn btn-dark btn-sm">Add New Page</a>
            
            <span class="pull-right" style="margin-top: 10px;">
              <a href="">All</a> | <a href="">Published</a> | <a href="">Draft</a> | <a href="">Trash</a>
            </span>
                                
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">                      
                    <th class="column-title"> Title </th>
                    <th class="column-title"> Author </th>
                    <th class="column-title"> Category </th>
                    
                    <th class="column-title"> Date </th>
                    <th class="column-title"> Status </th>
                    <th class="column-title"> Edit </th>
                    <th class="column-title no-link last"> Delete </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
    
                @foreach($pages as $page)
                  <tr class="even pointer">                             
                    <td class=" ">{{ $page -> title}}</td>
                    <td class=" ">{{ $page ->user->firstname}} </td>
                    <td class=" ">                               
                       @foreach($page->categories as $cat)                          
                          <span class="label label-info label-many" style="font-weight:300;">{{$cat->name}}</span>
                       @endforeach
                    </td>
                    
                    <td class=" ">{{ Carbon\Carbon::parse($page->created_at)->diffForHumans() }}</td>
                    <td class=" "> {{ $page -> status}} </td>
                    <td class="" style="width: 5%;">
                      
                      
                      <a href="{{ route('page.edit' , $page->id)}}" >
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                   
                      
                    </td>
                    <td style="width: 5%;">
                      <form action="{{ route('page.destroy' , $page->id)}}" method="POST" class="delete-form">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button style="background: none;border: none;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      </form>
                    </td>
                  </tr>
                 @endforeach

                </tbody>
              </table>
            </div>
			      
            {{ $pages->links() }}



             
		     
          </div>
        </div>
    	</div>
  </div>
          
</div>



    
@endsection