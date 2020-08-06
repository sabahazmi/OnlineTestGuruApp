@extends('layouts.app')

@section('content')

<div class="container main-container mt-2">
    <div class="card shadow-sm">
    <div class="d-inline bg-info p-2"><b class=" text-white">Course : {{$video->course->name}}</b></div>

    <div class="col mt-2">
        <div class="col-md-12">
            <div class="artplayer-app"></div>
            <script>

                var art = new Artplayer({
                container: '.artplayer-app',
                url: '/storage/videos/{{$video->file_url}}',
                autoplay: true,
                fullscreen: true,
            });
            </script>
            <!-- Status -->
             <!--    @if($video->is_approved=='0')
                <span class="badge badge-warning">Waiting</span>
                @else
                <span class="badge badge-success">Approved</span>
                @endif
             -->
             <div id="containerIntro" class="mt-2">
                <h1>{{$video->title}}</h1>
                <p class="text-muted">{{$video->created_at}}</p>
                <hr>
            </div>
            <p class="text-justify">{{$video->description}}</p>
       
                  
         </div>
        <!-- </div>         -->
    </div>
</div>
@endsection