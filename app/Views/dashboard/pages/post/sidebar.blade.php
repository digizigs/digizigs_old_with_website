<div class="filemgr-sidebar">
      
    <div class="filemgr-content-header">
        <h4 class="mg-t-10">Posts</h4>
    </div><!-- filemgr-content-header -->

    <div class="filemgr-sidebar-body">
        <div class="pd-t-20 pd-b-10 pd-x-20">
            <ul class="nav nav-aside">

              <li class="nav-label active">Posts</li>
              <li class="nav-item"><a href="{{route('post.index')}}" class="nav-link"><i data-feather="cast"></i> <span>All Post</span></a></li>
              <li class="nav-item"><a href="{{route('post.create')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add Post</span></a></li>

              <li class="nav-label mg-t-25">Post Types</li>
              <li class="nav-item"><a href="{{route('post.index',['type'=>'published'])}}" class="nav-link"><i data-feather="maximize"></i> <span>Published</span></a></li>
              <li class="nav-item"><a href="{{route('post.index',['type'=>'draft'])}}" class="nav-link"><i data-feather="minimize"></i> <span>Draft</span></a></li>
              <li class="nav-item"><a href="{{route('post.index',['type'=>'trash'])}}" class="nav-link"><i data-feather="trash"></i> <span>Trash</span></a></li>

            </ul>
        </div>
    </div>

</div><!-- filemgr-sidebar -->