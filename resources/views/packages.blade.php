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

<!-- <div class="container my-4"> -->
<section class="mx-5">
   <div class="row my-3 justify-content-center">
      <form>
         <input type="radio" name="science"> Science
         <input type="radio" name="science"> Science
         <input type="radio" name="science"> Science
         <input type="radio" name="science"> Science
      </form>
   </div>
   <div class="row">
      <div class="col-sm-2 bg-dark fixed"></div>
      <div class="col-sm-7">
         @foreach($packages as $package)
         <a class="text-justify" href="{{url('/package')}}/{{$package->id}}">
            <div class="card bg-white rounded-0 mb-3 p-2">
               <div class="card-body">
                  <h4>{{$package->name}}</h4>
                  <ul>
                  @foreach($package->courses as $course)
                     <li class="text-secondary">{{$course->name}}</li>
                  @endforeach
                  </ul>
                  <!-- <small>Posted : {{date('j M Y', strtotime($package->created_at))}}</small><br> -->
                  <i class="fas fa-rupee-sign text-muted"> {{$package->price}}</i>
               </div>
            </div>
         </a>
         @endforeach
      </div>
      <div class="col-sm-3 bg-warning"></div>
   </div>
</section>
<!-- </div> -->   


<div class="container-fluid">
   <div class="row my-2 text-center">
     <div class="col-md-12 col-xs-12 col-sm-12 p-2">
         <div class="row my-5 justify-content-center">
            @foreach($packages as $package)
            <div class="col-md-3 col-sm-3 col-xs-3 mb-4">
               <a class="text-justify" href="{{url('/package')}}/{{$package->id}}">
                  <div class="card bg-white rounded-0 p-2">
                     <div class="card-body">
                        <h4>{{$package->name}}</h4>
                        @foreach($package->courses as $course)
                           <li class="text-secondary">{{$course->name}}
                        @endforeach
                        <br>
                        <!-- <small>Posted : {{date('j M Y', strtotime($package->created_at))}}</small><br> -->
                        <i class="fas fa-rupee-sign text-muted"> {{$package->price}}</i>
                     </div>
                  </div>
               </a>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>


@endsection