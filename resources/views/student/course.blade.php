@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-dark text-white"><i class="fas fa-award"></i> New Course</div>

                <div class="card-body">
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
    <hr>
     <!-- start of table  to show courses -->
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">#</th>
                  <td>Name</td>
                  <td>Category</td>
               </tr>
                @foreach($courses as $course)
                <tr>
                  <th scope="row">{{$course->id}}</th>
                  <td>{{$course->name}}</td>
                  <td>{{$course->category->name}}</td>
               </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
