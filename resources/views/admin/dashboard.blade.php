@extends('layouts.app')
@section('content')
<div class="page-wrapper chiller-theme toggled">
   <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
   <i class="fas fa-bars"></i>
   </a>
   <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
         <div class="sidebar-brand">
            <a href="#">Online Test Guru</a>
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
<!--          <div class="sidebar-search">
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
         </div> -->
         <!-- sidebar-search  -->
         <div class="sidebar-menu">
            <ul>
             <!--   <li class="header-menu">
                  <span>General</span>
               </li> -->
               <li class="sidebar-dropdown">
                  <a href="/admin/dashboard">
                  <i class="fas fa-tachometer-alt"></i>
                  <span>Dashboard</span>
                  <span class="badge badge-pill badge-warning">New</span>
                  </a>
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
                           <a href="#">Teachers</a>
                        </li>
                        <li>
                           <a href="#">Students</a>
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
         <h2>Admin Dashboard</h2>
         <hr>
         <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 mb-1">
               <div class="card bg-card text-light rounded-0 p-2 shadow-sm">
                  <div class="card-body text-center">
                     <h4><i class="fas fa-school"></i></h4>
                     <h5 class="card-title">
                     Categories <sup><span class="badge rounded-circle badge-warning">{{sizeof($categories)}}</span>
                  </div>
               </div>
            </div>
            <div  class="col-xs-12 col-sm-6 col-md-6 col-lg-3 mb-1">
               <div  class="card bg-card text-white rounded-0 p-2 shadow-sm">
                  <div class="card-body text-center">
                     <h4><i class="fas fa-award"></i></h4>
                     <h5 class="card-title">
                     Courses <sup><span class="badge rounded-circle badge-warning">{{sizeof($courses)}}</span>
                  </div>
               </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 mb-1">
               <div class="card bg-card text-light rounded-0 p-2 shadow-sm">
                  <div class="card-body text-center">
                     <h4><i class="fas fa-users"></i></h4>
                     <h5 class="card-title">
                     Students <sup><span class="badge rounded-circle badge-warning">{{sizeof($studentUsers)}}</span>
                  </div>
               </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 mb-1">
               <div class="card bg-card text-light rounded-0 p-2 shadow-sm">
                  <div class="card-body text-center">
                     <h4><i class="fas fa-envelope"></i></h4>
                     <h5 class="card-title">Messages <sup><span class="badge rounded-circle badge-warning">{{sizeof($studentUsers)}}</span></sup></h5>
                     <p class="badge badge-warning text-white"></p>
                  </div>
               </div>
            </div>
         </div>
         <!-- <hr> -->
         <div class="row">
            <div class="my-4 col-xs-12 col-sm-6 col-md-6 col-lg-12">
               <div class="card rounded-0 p-0 shadow-sm">
                  <div class="card-body">
                     <h5 class="card-title">Categories</h5>
                     <table class="table">
                        <tbody>
                           @foreach($categories as $category)
                           <tr>
                              <th scope="row">{{$category->id}}</th>
                              <td>{{$category->name}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="my-4 col-xs-12 col-sm-6 col-md-6 col-lg-12">
               <div class="card rounded-0 p-0 shadow-sm">
                  <div class="card-body">
                     <h5 class="card-title">Courses</h5>
                     <table class="table">
                        <tbody>
                           @foreach($courses as $course)
                           <tr>
                              <th scope="row">{{$course->id}}</th>
                              <td>{{$course->name}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="my-4 col-xs-12 col-sm-6 col-md-6 col-lg-12">
               <div class="card rounded-0 p-0 shadow-sm">
                  <div class="card-body">
                     <h5 class="card-title">Users</h5>
                     <table class="table table-responsive text-center">
                        <tbody>
                           <tr class="">
                              <!-- <th scope="row">User ID</th> -->
                              <th scope="row">Name</th>
                              <th scope="row">Status</th>
                              <th scope="row">Email</th>
                              <th scope="row">Mobile</th>
                              <th scope="row">Joined</th>
                           </tr>
                           @foreach($users as $user)
                           <tr>
                              <!-- <th scope="row">{{$user->id}}</th> -->
                              <td>{{$user->name}}</td>
                              <td><span class="badge badge-pill badge-warning">{{$user->role->name}}</span></td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->mobile}}</td>
                              <td>{{date('j M Y', strtotime($user->created_at))}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- Button trigger modal -->
         <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
            </button> -->
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     ...
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
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