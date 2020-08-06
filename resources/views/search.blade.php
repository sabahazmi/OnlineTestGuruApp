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
<div class="container card my-5 justify-content-center">
	<div class="row justify-content-center">
	    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 my-5 text-center">
	    	<h4 class="p-2">Search Anything</h4>

	      <form class="searchForm text-center form-inline justify-content-center"
	      method="get" action="{{url('search')}}">
	          <input type="text" name="search" autofocus="" autocomplete="off" placeholder="Search...">
	          <button class="btn-info"><i class="fas fa-search"></i></button>
	        </form>
	      </form>
	    </div>
	</div>

	<div class="row justify-content-center">
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
</div>
@endsection
