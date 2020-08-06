@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header text-white bg-dark"><i class="fas fa-video"></i> New Video</div>
            <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
              var fileName = $(this).val().split("\\").pop();
              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            </script>
                <div class="card-body">
                   <form method="POST" action="{{url('/add-video') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="course_id" class="col-md-3 col-form-label text-md-right">{{ __('Course') }}</label>

                            <div class="col-md-8">
                                <select class="custom-select @error('course_id') is-invalid @enderror" name="course_id" value="{{ old('course_id') }}" required autocomplete="course_id" autofocus>
                                 <option selected>Select course</option>
                                  @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                  @endforeach
                                </select>
                                @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
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
                                <!-- <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus> -->

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <!--  <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('') }}</label>

                            <div class="col-md-8">
                               <span class="p-1 rounded text-white bg-secondary">OR</span>
                               <div> 
            <label> 
                <input type="radio" name="colorRadio" 
                       value="youtube_url"> Youtube</label> 
            <label> 
                <input type="radio" name="colorRadio" 
                       value="file_url"> File Src</label> 
</div>                               
                            </div>
                        </div> -->
 <script type="text/javascript"> 
            $(document).ready(function() { 
                $('input[type="radio"]').click(function() { 
                    var inputValue = $(this).attr("value"); 
                    var targetBox = $("." + inputValue); 
                    $(".selectt").not(targetBox).hide(); 
                    $(targetBox).show(); 
                }); 
            }); 
        </script>

      <!--   <div class="youtube_url selectt"> 
          <strong>C</strong> 
          is a procedural programming language</div> 
        <div class="file_url selectt"> 
          <strong>C++</strong> 
          is a general purpose programming language</div> 
       
 -->

                        <div class="form-group row youtube_url ">
                            <label for="youtube_url" class="col-md-3 col-form-label text-md-right">{{ __('Youtube URL') }}</label>

                            <div class="col-md-8">
                                <input id="youtube_url" type="url" class="form-control @error('youtube_url') is-invalid @enderror" name="youtube_url" value="{{ old('youtube_url') }}" autocomplete="youtube_url" autofocus>

                                @error('youtube_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                       
                        <div class="form-group row file_url ">
                            <label for="file_url" class="col-md-3 col-form-label text-md-right">{{ __('File URL') }}</label>
                            <div class="col-md-8">
                                <input id="file_url" type="file" accept="video" id="file_url" class="form-control p-0 border-0 bg-white @error('file_url') is-invalid @enderror" name="file_url" value="{{ old('file_url') }}" autocomplete="file_url" autofocus>

<!--                                 <div class="custom-file mb-3">

                                    <input id="customFile" type="file" class="custom-file-input @error('file_url') is-invalid @enderror" name="file_url" value="{{ old('file_url') }}" required autocomplete="file_url" autofocus> 
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
 -->
                                @error('file_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Add Video') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <hr>
      <!-- start of table  to show courses -->
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">#</th>
                  <td>Title</td>
                  <td>Course</td>
                  <!-- <td>Video</td> -->
                  <td>Status</td>
                  <td>Action</td>
               </tr>
                @foreach($videos as $video)
                <tr>
                  <th scope="row">{{$video->id}}</th>
                  <td><a href="{{url('course/view')}}\{{$video->id}}" target="_blank"> {{$video->title}}</a></td>
                  <td>{{$video->course->name}}</td>
                  <!-- <td><img  class="w-25 h-25" src="/storage/videos/{{$video->file_url}}"></td> -->
                  <td>

                    @if($video->is_approved=='0')
                    <span class="badge badge-warning">Not Approved</span>
                    @else
                    <span class="badge badge-success">Approved</span>
                    @endif
                  </td> 
                <td>
                    @if($video->is_approved=='0')
                        <a href="{{url('/approve-video')}}\{{$video->id}}"><button class="btn btn-primary">Approve</button></a>
                    @else
                      <button class="btn btn-danger">Reject</button>
                    @endif
                </td>
               </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
