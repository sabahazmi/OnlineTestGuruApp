@extends('layouts.app')
@section('content')
<div class="page-wrapper chiller-theme toggled">
   <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
   <i class="fas fa-bars"></i>
   </a>
   <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
         <div class="sidebar-brand">
            <a href="/">Online Test Guru </a>
            <div id="close-sidebar">
               <i class="fas fa-times"></i>
            </div>
         </div>
         <div class="sidebar-header">
            <div class="user-pic">
               <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
            </div>
            <div class="user-info">
               <span class="user-name">{{ Auth::user()->name }} 
               </span>
               <span class="user-role">{{ Auth::user()->role->name }} </span>
               <span class="user-status">
               <i class="fa fa-circle"></i>
               <span>Online</span>
               </span>
            </div>
         </div>
         <!-- sidebar-header  -->
         <div class="sidebar-search">
            <div>
               <div class="input-group">
                  <input type="text" class="form-control search-menu" placeholder="Search...">
                  <div class="input-group-append">
                     <span class="input-group-text">
                     <i class="fa fa-search" aria-hidden="true"></i>
                     </span>
                  </div>
               </div>
            </div>
         </div>
         <!-- sidebar-search  -->
         <div class="sidebar-menu">
            <ul>
               <li class="header-menu">
                  <span>General</span>
               </li>
               <li class="sidebar-dropdown">
                  <a href="/admin/dashboard">
                  <i class="fas fa-tachometer-alt"></i>
                  <span>Dashboard</span>
                  <span class="badge badge-pill badge-warning">New</span>
                  </a>
                  <div class="sidebar-submenu">
                     <ul>
                        <li>
                           <a href="#">Dashboard 1
                           <span class="badge badge-pill badge-success">Pro</span>
                           </a>
                        </li>
                        <li>
                           <a href="#">Dashboard 2</a>
                        </li>
                        <li>
                           <a href="#">Dashboard 3</a>
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="sidebar-dropdown">
                  <a href="/admin/category">
                  <i class="fas fa-school"></i>
                  <span>Categories</span>
                  <span class="badge badge-pill badge-danger">3</span>
                  </a>
                  <div class="sidebar-submenu">
                     <ul>
                        <li>
                           <a href="#">Products
                           </a>
                        </li>
                        <li>
                           <a href="#">Orders</a>
                        </li>
                        <li>
                           <a href="#">Credit cart</a>
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="sidebar-dropdown">
                  <a href="/admin/course">
                  <i class="fas fa-award"></i>
                  <span>Course</span>
                  </a>
                  <div class="sidebar-submenu">
                     <ul>
                        <li>
                           <a href="#">General</a>
                        </li>
                        <li>
                           <a href="#">Panels</a>
                        </li>
                        <li>
                           <a href="#">Tables</a>
                        </li>
                        <li>
                           <a href="#">Icons</a>
                        </li>
                        <li>
                           <a href="#">Forms</a>
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="sidebar-dropdown">
                  <a href="/admin/video">
                  <i class="fas fa-video"></i>
                  <span>Video</span>
                  </a>
                  <div class="sidebar-submenu">
                     <ul>
                        <li>
                           <a href="#">Pie chart</a>
                        </li>
                        <li>
                           <a href="#">Line chart</a>
                        </li>
                        <li>
                           <a href="#">Bar chart</a>
                        </li>
                        <li>
                           <a href="#">Histogram</a>
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="sidebar-dropdown">
                  <a href="/admin/package">
                  <i class="fas fa-archive"></i>
                  <span>Package</span>
                  </a>
                  <div class="sidebar-submenu">
                     <ul>
                        <li>
                           <a href="#">Google maps</a>
                        </li>
                        <li>
                           <a href="#">Open street map</a>
                        </li>
                     </ul>
                  </div>
               </li>
            </ul>
         </div>
         <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer">
         <a href="#">
         <i class="fa fa-bell"></i>
         <span class="badge badge-pill badge-warning notification">3</span>
         </a>
         <a href="#">
         <i class="fa fa-envelope"></i>
         <span class="badge badge-pill badge-success notification">7</span>
         </a>
         <a href="#">
         <i class="fa fa-cog"></i>
         <span class="badge-sonar"></span>
         </a>
         <a href="/logout">
         <i class="fa fa-power-off"></i>
         </a>
      </div>
   </nav>
   <!-- sidebar-wrapper  -->
   <main class="page-content">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-md-10">
               @if (session('status'))
               <div class="alert alert-info">
                  {{ session('status') }}
               </div>
               @endif
            </div>
         </div>
         <h2><i class="fas fa-video"></i> Videos</h2>
         <!-- <hr> -->
         <div class="my-4 col-xs-12 col-sm-6 col-md-6 col-lg-12">
            <div class="p-0">
               <!-- <div class="card-body"> -->
               <table class="card table table-responsive">
                  <tbody>
                     <tr>
                        <td class="border-0">Action</td>
                        <td class="border-0">Title</td>
                        <td class="d-none border-0">Course</td>
                        <!-- <td>Video</td> -->
                        <td class="d-none border-0">Status</td>
                        <td class="d-none border-0">Action</td>
                        <td class="d-none border-0">Homepage</td>
                     </tr>
                     @foreach($videos as $video)
                     <tr>
                        <td><button class="btn btn-dark" type="button" id="previewBtn"  data-toggle="modal" data-target="#previewModal{{$video->id}}"><i class="fas fa-cog"></i></button></td>
                        
                        <td>{{$video->title}}</td>

                        <td class="d-none">{{$video->course->name}}</td>

                        <td class="d-none">
                           @if($video->is_approved=='0')
                           <span class="badge badge-warning">Not Approved</span>
                           @else
                           <span class="badge badge-success">Approved</span>
                           @endif
                        </td>
                        <td class="d-none">
                           @if($video->is_approved=='0')
                           <a href="{{url('/admin/approve-video')}}\{{$video->id}}"><button class="btn btn-success">Approve</button></a>
                           @else
                           <a href="{{url('/admin/reject-video')}}\{{$video->id}}"><button class="btn btn-danger">Reject</button></a>
                           @endif
                        </td>
                        <td class="d-none text-center">
                        @if($freeVideo->video_id == $video->id)                        
                           <i class="fas fa-check text-success"></i>
                        @else
                           <i class="fas fa-times text-danger"></i>
                        @endif
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <div class="justify-content-center">
                {{ $videos->links() }}
               </div>
            </div>
         </div>
      </div>
</div>
</div>
</main>
<!-- page-content" -->
</div>
@foreach($videos as $video)
<!-- Modal -->
<div class="modal fade" id="previewModal{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="previewModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="text-justify modal-title" id="exampleModalLabel">{{$video->title}}</h6>
        
      </div>
      <div id="modal-body-video" class="modal-body">
         <span class="badge badge-warning">{{$video->course->name}}</span>     
            @if($video->is_approved=='0')
               <span class="badge badge-danger">Not Approved</span>
            @else
               <span class="badge badge-success">Approved</span>
            @endif
        <video
          id="my-video"
          class="video-js"
          controls
          preload="auto"
          width="auto"
          height="auto"
          data-setup="{}"
        >
          <source src="{{ asset('videos')}}/{{$video->file_url}}" type="video/mp4" />
          <source src="{{ asset('videos')}}/{{$video->file_url}}" type="video/webm" />
          <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank"
              >supports HTML5 video</a
            >
          </p>
  </video>

      </div>
      <div class="modal-footer">
            <p>
            @if($freeVideo->video_id == $video->id)                        
            <span class="badge badge-success">Homepage</span>
            @else
               <a href="{{url('/admin/free-video')}}\{{$video->id}}"><button class="btn btn-dark">Homepage</button></a>
            @endif
            
            
         @if($video->is_approved=='0')
         <a href="{{url('/admin/approve-video')}}\{{$video->id}}"><button class="btn btn-success">Approve</button></a>
         @else
         <a href="{{url('/admin/reject-video')}}\{{$video->id}}"><button class="btn btn-danger">Reject</button></a>
         @endif
         </p>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $('#modal-body-video').on('hidden.bs.modal', function () {
        callPlayer('modal-body-video', 'stopVideo');
    });
</script>
@endforeach
<!-- page-wrapper -->
@endsection