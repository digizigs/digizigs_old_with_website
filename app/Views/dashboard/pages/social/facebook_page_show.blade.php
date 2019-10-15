@extends('layouts.dashboard.appfile')

@section('title','Facebook Page Management')


@section('css')
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">
@endsection


@section('content')

<div class="filemgr-wrapper">

  <div class="filemgr-sidebar">

    <div class="filemgr-sidebar-header d-flex">
        <h4>Facebook Manager</h4>
    </div>
    
    <div class="filemgr-sidebar-body">
      <div class="pd-t-20 pd-b-10 pd-x-10">
        

        <nav class="nav nav-sidebar tx-13">
          @foreach($pages as $page)
            <a href="{{route('facebook.page.show',['page_id'=> '2342244234','access_token'=>'dasdasdasd'])}}" class="nav-link ">
              <i data-feather="cast"></i> <span>{{$page['page_name']}}</span>
            </a>
          @endforeach
        </nav>
      </div>
    </div><!-- filemgr-sidebar-body -->

  </div><!-- filemgr-sidebar -->

  <div class="filemgr-content">
    <div class="filemgr-content-header">
      <nav class="nav d-none d-sm-flex mg-l-auto">
        <a href="" data-toggle="tooltip" title="Download" class="nav-link"><i data-feather="download"></i></a>
        <a href=""  data-toggle="tooltip" title="Clean" class="nav-link"><i data-feather="repeat"></i></a>
        <a href=""  data-toggle="tooltip" title="Deletse All" class="nav-link"><i data-feather="trash"></i></a>
      </nav>
    </div><!-- filemgr-content-header -->
    <div class="filemgr-content-body">
    
      <div class="pd-10 pd-lg-10 pd-xl-10">

        <div class="row">
          @foreach($pages as $page)
            <div class="col-sm-6 col-md-4">
              <div class="card card-profile">
                <img src="{{$page['cover_photo']}}" class="card-img-top" alt="">
                <div class="card-body tx-13">
                  <div>
                    <a href="">
                      <div class="avatar avatar-lg">
                        <span class="avatar-initial rounded-circle bg-indigo" style="overflow:hidden;">
                          <img src="{{$page['page_photo']}}" alt="">
                        </span>
                      </div>
                    </a>
                    <h5><a href="">{{$page['page_name']}}</a></h5>
                    <p>{{$page['category']}}</p>

                    <div class="img-group img-group-sm mg-b-5">
                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
                    </div>
                    <div class="mg-b-25">
                      <span class="tx-12 tx-color-03 info"><i class="fa fa-bullhorn" aria-hidden="true"></i>{{count($page['page_posts'])}} Posts</span>
                      <span class="tx-12 tx-color-03 info"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{$page['page_likes']}} Likes</span>
                    </div>

                    <button class="btn btn-block btn-white">Add Post</button>
                  </div>
                </div>
              </div><!-- card -->
            </div>
          @endforeach
        </div>
        
        <a href="#modal3" class="btn btn-dark" data-toggle="modal">Extra Large Modal</a>
          

          
          
      
      </div>
    </div><!-- filemgr-content-body -->
  </div><!-- filemgr-content -->

   

</div><!-- filemgr-wrapper -->

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel3">Modal Title</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="mg-b-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>uuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempore, obcaecati, dolorem soluta maiores, maxime non ducimus ipsam consequuntur fugiat dolor modi nam! Eligendi dolores facere vero accusamus eius temporibus!</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary tx-13">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection


@section('javascript')
    <script src="{{asset('public/dashboard/assets/js/dashforge.filemgr.js')}}"></script>
@endsection