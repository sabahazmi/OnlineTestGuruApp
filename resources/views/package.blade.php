@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row my-2 justify-content-center">
    <div class="col-md-10">
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
    </div>
  </div>
</div>
<div class="container py-4">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card shadow-sm bg-white text-dark rounded-0 p-2">
        <div class="card-body">
          <div class="d-inline">
            <h2 class="d-inline rounded-0">{{$package->name}}</h2>
          </div>
          <div class="d-inline float-right">
            <i class="fas fa-rupee-sign text-muted"> 500</i>
            @if(!$subscribed ?? '')
            <a href="{{url('/subscription')}}/{{Auth::user()->id}}/{{$package->id}}"><button class="ml-4 d-inline rounded-0 btn btn-warning">Subscribe</button></a>                     
            @endif   
          </div>
          <i class="row mt-2 px-3">
          Description asda asd asd asd sdfg  sdfgdf  sdfgsdfg sdfg dfsdfdsf dsfsdf sdfsdfg sdfsdfg sdfgsdfsdf sdf sdfsdf sdfsd sdfsdf sddf fddf sdfsd sdfsdf</i>
          <hr>

          <div class="d-inline">
            <ul>
              @foreach($package->courses as $course)
              <li>
                <h5 class="">{{$course->name}}</h5>
                <ol>
                  @foreach($course->videos as $video)
                    @if($video->is_approved == 1)
                    <li class="rounded-0 nav-item text-justify p-2">
                      @if(!$subscribed ?? '')
                        {{$video->title}}
                      @else
                        <a href="{{url('package')}}\{{$package->id}}/{{$video->id}}">{{$video->title}}</a>
                      @endif
                    </li>
                    @endif
                  @endforeach
                </ol>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection