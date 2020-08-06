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
                <div class="card-header bg-dark text-white"><i class="fas fa-school"></i> New Category</div>

                <div class="card-body">
                   <form method="POST" action="{{ url('/add-category') }}">
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
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Add Category') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<hr> 

    <!-- start of table  to show categories -->
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <th scope="row">{{$category->id}}</th>
                  <td>{{$category->name}}</td>
               </tr>
                @endforeach
              </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
