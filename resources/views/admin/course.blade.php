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
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
        </div>
      </div>
      <h2>Course</h2>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Course</button>
      <div class="my-4 col-xs-12 col-sm-6 col-md-6 col-lg-12">
        <div class="card rounded-0 p-0 shadow-sm">
          <!-- <div class="card-body"> -->
          <table class="table p-3 table-responsive">
            <tbody>
              <tr>
                <td class="border-0">#</td>
                <td class="border-0">Name</td>
                <td class="border-0">Category</td>
                <td class="border-0">Created</td>
              </tr>
              @foreach($courses as $course)
              <tr>
                <td>{{$course->id}}</td>
                <td>{{$course->name}}</td>
                <td>{{$course->category->name}}</td>
                <td>{{date('j M Y', strtotime($course->created_at))}}</td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('/add-course') }}">
          @csrf
          <div class="form-group row">
            <label for="category_id" class="col-md-3 col-form-label text-md-right">{{ __('Category') }}</label>
            <div class="col-md-8">
              <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required autocomplete="category_id" autofocus>
                <option selected>Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
              @error('youtube_url')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-8">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
            <div class="col-md-8">
              <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
              @error('description')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-3">
              <button type="submit" class="btn btn-info">
              {{ __('Add Course') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- page-content" -->
</div>
<!-- page-wrapper -->
@endsection