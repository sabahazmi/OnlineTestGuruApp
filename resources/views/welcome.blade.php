<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Sabah Azmi">
    <script type="text/javascript">window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>
    <title>{{ config('app.name', '') }}</title>
    <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <style type="text/css">
      @media(min-width:320px) and (max-width:767px){ 
      .searchForm input {
      width: auto !important; 
      }
      .searchForm input {
      padding: .4rem .8rem;
      border: 1px solid #6cb2eb;
      border-radius: 100px 0 0 100px;
      color:#000;
      text-align: center;
      outline: none;
      width: 25rem;
      font-size: .9rem;
      }
      .searchForm button {
      /*background: #ff826b;*/
      border: 1px solid #6cb2eb;
      padding: .4rem 1rem;
      color: #fff;
      border-radius: 0 100px 100px 0;
      outline: 0;
      width: 5rem;
      font-size: .9rem;
      cursor: pointer;
      -webkit-transition: all .2s;
      transition: all .2s;
      }
      form{
      padding: 0;
      margin: 0 0 1.45rem;
      }
    </style>
  </head>
  <body>
    @extends('layouts.app')
    @section('content')
    <div class="content">
      <div id="carouselExampleCaptions" class="carousel slide" data-interval="2000" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/slider1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/slider2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/slider3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row my-2 text-center">
        <div class="card col-md-9 col-xs-12 col-sm-12 p-2">
          <div class="row mb-2">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
              <form class="searchForm text-center form-inline justify-content-center"
                method="get" action="{{url('search')}}">
                <input type="text" name="search" autofocus="" autocomplete="off" placeholder="Search...">
                <button class="btn-info"><i class="fas fa-search"></i></button>
              </form>
              </form>
            </div>
          </div>
          <div class="row my-5 justify-content-center">
            @foreach($packages as $package)
            <div class="col-md-3 col-sm-6 mb-4">
              <a class="text-justify" href="{{url('/package')}}/{{$package->id}}">
                <div class="card course-card bg-white rounded-0 p-2">
                  <div class="card-body text-center">
                    <h5>{{$package->name}}</h5>
                    <!-- <h6>Category : <b></h6> -->
                    <small>Posted : {{date('j M Y', strtotime($package->created_at))}}</small>  
                  </div>
                </div>
              </a>
            </div>
            @endforeach
            @foreach($courses as $course)
            <div class="col-md-3 col-sm-6 mb-4">
              <a class="text-justify" href="{{url('/course')}}/{{$course->id}}">
                <div class="card course-card bg-white rounded-0 p-2">
                  <div class="card-body text-center">
                    <h5>{{$course->name}}</h5>
                    <!-- <h6>Category : <b></h6> -->
                    <p>{{$course->category->name }}</p>
                    <small>Posted : {{date('j M Y', strtotime($course->created_at))}}</small>  
                  </div>
                </div>
              </a>
            </div>
            @endforeach   
            @foreach($categories as $category)
            <div class="col-md-3 col-sm-6 mb-4">
              <a class="text-justify" href="{{url('/category')}}/{{$category->id}}">
                <div class="card course-card bg-white rounded-0 p-2">
                  <div class="card-body text-center">
                    <h5>{{$category->name}}</h5>
                    <!-- <h6>Category : <b></h6> -->
                    <small>Posted : {{date('j M Y', strtotime($category->created_at))}}</small>  
                  </div>
                </div>
              </a>
            </div>
            @endforeach       
          </div>
        </div>
        <div class="col-md-3 bg-light col-xs-12 col-sm-12 p-2">
          <h4>Advertisement</h4>
          <h4>Advertisement</h4>
          <h4>Advertisement</h4>
          <h4>Advertisement</h4>
          <h4>Advertisement</h4>
          <h4>Advertisement</h4>
          <h4>Advertisement</h4>
          <h4>Advertisement</h4>
        </div>
      </div>
    </div>
    <!-- <div class="container"> -->
      <div class="row mx-auto">
        <div class="col-sm-6 bg-warning py-3 px-5">
          <h5 class="py-2 px-2"><i class="fas fa-video"></i> {{$freeVideo->video->title}}</h5>
          <video
            id="my-video"
            class="video-js"
            controls
            preload="auto"
            width="auto"
            height="auto"
            data-setup="{}"
          >
          <source src="{{ asset('videos')}}/{{$freeVideo->video->file_url}}" type="video/mp4">
            <source src="{{ asset('videos')}}/{{$freeVideo->video->file_url}}" type="video/ogg">
          <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank"
              >supports HTML5 video</a
            >
          </p>
          </video>

        </div>
        <div class="col-sm-6 bg-dark">
          
        </div>
      </div>
    <!-- </div> -->
    <div class="container my-5">
      <div class="row">
        <div class="col-sm-2 justify-content-center">
          <img class="w-50 border img-responsive rounded-circle" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture"><br>
          <p class="text-justify">Founder</p>
        </div>
        <div class="col-sm-10"><i>Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message Message.</i></div>
      </div>
    </div>

    <div class="container-fluid bg-danger shadow-lg c-no px-4 py-4">
      <div class="container">
        <div class="row" id="counter">
          <div class="col-sm-3 counter-Txt"> Teachers <span class="counter-value" data-count="{{sizeof($instructorUsers)}}">0</span></div>
          <div class="col-sm-3 counter-Txt"> Students <span class="counter-value" data-count="{{sizeof($studentUsers)}}">0</span></div>
          <div class="col-sm-3 counter-Txt"> Courses <span class="counter-value" data-count="{{sizeof($coursesCount)}}">0</span> </div>
          <div class="col-sm-3 counter-Txt"> Videos <span class="counter-value" data-count="{{sizeof($videos)}}">0</span></div>
        </div>
      </div>
    </div>
    @endsection
    </div>
  </body>
</html>