@extends('layouts.app')
@section('content')
<div class="container my-5">
   <div class="row justify-content-center">
      <div class="col-md-6">
         @if (session('status'))
         <div class="alert alert-success">
            {{ session('status') }}
         </div>
         @endif
         <div class="card">
            <div class="card-header bg-dark text-white"><i class="fas fa-school"></i> New Package</div>
            <div class="card-body">
               <form method="POST" action="{{ url('/admin/package') }}">
                  @csrf
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
                     <label for="course_id" class="col-md-3 col-form-label text-md-right">{{ __('Course') }}</label>
                     <div class="col-md-8">
                        <select  multiple size="7" class="custom-select @error('course_id') is-invalid @enderror" name="course_id[]" value="{{ old('course_id') }}" required autocomplete="course_id" autofocus>
                           <!-- <option>Select Course</option> -->
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
                     <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Price') }}</label>
                     <div class="col-md-8">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row mb-0">
                     <div class="col-md-8 offset-md-3">
                        <button type="submit" class="btn btn-info">
                        {{ __('Add Package') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection