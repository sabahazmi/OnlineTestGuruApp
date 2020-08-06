@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row mx-sm-1 my-4">
   	
   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
      <div class="card bg-white border-0 rounded-0 shadow-sm">
         <div class="card-body">
           <video id="my-video" class="video-js" controls preload="auto" width="auto" height="auto" data-setup="{}">
          <source src="{{ asset('videos') }}/{{$video->file_url}}" type="video/mp4">
          <source src="{{ asset('videos') }}/{{$video->file_url}}" type="video/ogg">
          <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank"
              >supports HTML5 video</a
            >
          </p>
  </video>
           
      <div id="containerIntro" class="mt-2">
         <h1>{{$video->title}}</h1>
         <p class="text-muted">{{date('D, jS M Y', strtotime($video->created_at))}}</p>
      </div>
      <hr>
     @foreach($video->assignments as $assignment )
      <div class="d-inline m-auto"> Assignements: 
         <a href="{{ asset('assignment') }}/{{$assignment->file_name}}" download>
            <button class="py-1 rounded-0 btn btn-danger ">{{$assignment->file_name}}
               <i class="text-white fas fa-download"></i>
            </button>
         </a>
      </div>
      <hr>
      @endforeach
      <p class="text-justify">{{$video->description}}</p>
         </div>
      </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <div class="card border-0 bg-white text-black rounded-0 shadow-sm">
         <div class="card-body text-center">
            <div class="card-header rounded-0 pb-0">
              <h3 class="text-center">{{$package->name}}</h3>
            </div>
            
        @foreach($package->courses as $course)<hr>
        <h4 class="d-inline-block mb-2"><!-- <i class="fas fa-award"></i> --> {{$course->name}} </h4>
       
        <!-- <hr class="mt-0 mb-0"> -->
            <ul class="p-0 bg-light flex-column">
            @forelse($course->videos as $video)
               <li class="rounded-0 nav-item text-justify vidlist">
                  <a class="nav-link " href="{{url('package')}}\{{$package->id}}/{{$video->id}}">
                  		{{$video->title}}
                  </a>
               </li>
               @empty

               <li class="rounded-0 nav-item text-justify vidlist">
               		<a class="nav-link" href="#">
                  		No video in this course
                  </a>
               </li>
            @endforelse
        <!-- <hr class="mt-0 mb-0"> -->
            </ul>
        @endforeach
         </div>
      </div>
   </div>
</div>
</div>
@endsection