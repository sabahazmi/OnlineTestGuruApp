@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         @if (session('status'))
         <div class="alert alert-success">
            {{ session('status') }}
         </div>
         @endif
      </div>
   </div>
</div>

<!-- When using as guest -->
@guest
<div class="container py-4">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="card shadow-sm bg-white text-dark rounded-0 p-2">
            <div class="card-body">
               <div class="d-inline">
                  <h2 class="d-inline rounded-0">{{$course->name}}</h2>
                  <i class="d-inline ml-4 text-muted">by Name</i>
               </div>
               <div class="d-inline float-right">
                  <i class="fas fa-rupee-sign text-muted"> 500</i>
                  <a href="{{url('/login')}}"><button class="ml-4 d-inline rounded-0 btn btn-warning">Subscribe</button>
               </div>
               <hr>
               <p class="mt-2 text-justify">{{$course->description}}</p>
               <ul class="nav-item flex-column">
               <p class="">Course Content</p>
               @forelse($videos as $video)
               <li class="mb-1 text-justify">
                  {{$video->title}}
               </li>
               @empty
               <p class="text-danger"><i class="fas fa-exclamation-circle"></i> No video in this course</p>
               @endforelse
            </div>
         </div>
      </div>
   </div>
</div>
@else
<!-- When using as user -->
@if(!$subscribed)
<div class="container py-4 e">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="card shadow-sm bg-white text-dark rounded-0 p-2">
            <div class="card-body">
               <h2 class="d-inline-block"><span class="bg-inverse text-whte">{{$course->name}}</span></h2>
               <i class="d-inline-block ml-4 text-muted">by Name</i>
               <a href="{{url('/subscription')}}/{{Auth::user()->id}}/{{$course->id}}"><button class="float-right rounded-0 btn btn-danger">Subscribe</button></a>
               <p class="mt-2 text-justify">{{$course->description}}</p>
               <hr>
               <ul class="nav-item flex-column">
               <p class="">Course Content</p>
               @forelse($videos as $video)
               <li class="mb-1 text-justify">
                  {{$video->title}}
               </li>
               @empty
               <p class="text-danger"><i class="fas fa-exclamation-circle"></i> No video in this course</p>
               @endforelse
               @if($video_to_play=="")
               <p class="text-danger"><i class="fas fa-exclamation-circle"></i> No video in this course</p>
               @endif        
            </div>
         </div>
      </div>
   </div>
</div>
@endif

@if($video_to_play!="")
<div class="row mx-4 my-4">
  @if($subscribed)
   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
      <div class="card bg-white rounded-0 shadow-sm">
         <div class="card-body">
           <video width="" height="400" controls>
               <source src="/storage/videos/{{$video_to_play->file_url}}" type="video/mp4">
               <source src="/storage/videos/{{$video_to_play->file_url}}" type="video/ogg">
            </video>
      <div id="containerIntro" class="mt-2">
         <h1>{{$video_to_play->title}}</h1>
         <p class="text-muted">{{date('D, jS M Y', strtotime($video_to_play->created_at))}}</p>
      </div>
      <hr>
      @foreach($video_to_play->assignments as $assignment )
      <div class="d-inline m-auto"> 
         <a href="/storage/assignment/{{$assignment->file_name}}" download>
            <button class="py-1 rounded-0 btn btn-danger ">{{$assignment->file_name}}
               <i class="text-white fas fa-download"></i>
            </button>
         </a>
      </div>
      <hr>
      @endforeach
      <p class="text-justify">{{$video_to_play->description}}</p>
         </div>
      </div>
   </div>
   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
      <div class="card bg-white rounded-0 shadow-sm">
         <div class="card-body text-center">
        <h4 class="d-inline-block mb-2"><!-- <i class="fas fa-award"></i> --> {{$course->name}} </h4>
        <hr class="mt-0 mb-0">
            <ol class="p-0 border-danger flex-column">
               @foreach($videos as $video)
               <li class="rounded-0 nav-item text-justify vidlist">
                  <a class="nav-link " href="{{url('course')}}\{{$course_id}}\{{$video->id}}">
                  {{Str::limit($video->title, 50)}}
                  </a>
               </li>
        <hr class="mt-0 mb-0">

               @endforeach
            </ol>
         </div>
      </div>
   </div>
   @endif
</div>
@endif
@endguest



@if (session('subscriptionMessage'))
<script>
   $('#exampleModal').modal('show');
</script>


@endif
@endsection
