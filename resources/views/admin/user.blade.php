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
               <img class="img-responsive img-rounded" src="/img/bg.jpg" alt="User picture">
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
               <li class="sidebar-dropdown">
                  <a href="#">
                  <i class="fas fa-users"></i>
                  <span>Users</span>
                  </a>
                  <div class="sidebar-submenu">
                     <ul>
                        <li>
                           <a style="cursor: pointer;" onclick="teacher()">Teacher</a>
                        </li>
                        <li>
                           <a style="cursor: pointer;" onclick="myFunction()">Student</a>
                        </li>
                     </ul>
                  </div>
               </li>
            </ul>
         </div>
<script type="text/javascript">
function myFunction() {
  document.getElementById("teacher").style.display = "none";
  document.getElementById("student").style.display = "block";
}
function teacher() {
  document.getElementById("student").style.display = "none";
  document.getElementById("teacher").style.display = "block";
}
</script>
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
               <div class="alert alert-success">
                  {{ session('status') }}
               </div>
               @endif
            </div>
         </div>
         
         <div id="teacher" class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
            <h2>Teacher</h2>
         <hr>
            <div class="card rounded-0 p-0 shadow-sm">
               <!-- <div class="card-body"> -->
               <table class="table p-3 table-responsive">
                  <tbody>
                    <tr>
                        <td class="border-0">#</td>
                        <td class="border-0">Name</td>
                        <td class="border-0">Role</td>
                        <td class="border-0">Joined</td>
                    </tr>
                     @foreach($instructorUsers as $instructorUser)
                    <tr>
                      <td>{{$instructorUser->id}}</td>
                      <td>{{$instructorUser->name}}</td>
                      <td>{{$instructorUser->role->name}}</td>
                      <td>{{date('j M Y', strtotime($instructorUser->created_at))}}</td>
                   </tr>
                   @endforeach
                  </tbody>
               </table>
            </div>
         </div>

         <div style="display: none;" id="student" class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
            <h2>Student</h2>
         <hr>
            <div class="card rounded-0 p-0 shadow-sm">
               <!-- <div class="card-body"> -->
               <table class="table p-3 table-responsive">
                  <tbody>
                    <tr>
                        <td class="border-0">#</td>
                        <td class="border-0">Name</td>
                        <td class="border-0">Role</td>
                        <td class="border-0">Joined</td>
                    </tr>
                     @foreach($studentUsers as $studentUser)
                    <tr>
                      <td>{{$studentUser->id}}</td>
                      <td>{{$studentUser->name}}</td>
                      <td>{{$studentUser->role->name}}</td>
                      <td>{{date('j M Y', strtotime($studentUser->created_at))}}</td>
                   </tr>
                   @endforeach
                  </tbody>
               </table>
            </div>
         </div>

      </div>
</div>
</div>
</main>
<!-- page-content" -->
</div>
<!-- page-wrapper -->
@endsection