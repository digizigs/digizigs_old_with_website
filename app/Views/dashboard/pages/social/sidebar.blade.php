<div class="filemgr-sidebar">

    <div class="filemgr-sidebar-header d-flex">
        <h4>Facebook Manager</h4>
    </div>
    
    <div class="filemgr-sidebar-body">
      <div class="pd-t-20 pd-b-10 pd-x-10">
        

        <nav class="nav nav-sidebar tx-13">
          @foreach($pages as $page)
            <a href="{{route('facebook.page.show',['page_id'=> $page['page_id'],'access_token'=>'dasdasdasd'])}}" class="nav-link ">
              <i data-feather="cast"></i> <span>{{$page['page_name']}}</span>
            </a>
          @endforeach
        </nav>
      </div>
    </div><!-- filemgr-sidebar-body -->

</div><!-- filemgr-sidebar -->