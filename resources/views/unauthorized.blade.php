@extends('layouts.app')

@section('content')
<div class="title m-b-md text-center bg-danger py-4 px-4 text-white" style="height: 70vh;">
	<h1><i class="fas fa-exclamation-triangle"></i><br>You cannot access this page!<br>This is for only {{$role}}</h1>
</div>
@endsection
