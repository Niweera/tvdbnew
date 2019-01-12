@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5 mb-4" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">TV Series Data</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="list-group-item">
            <h3><a href="{{ \App\Http\Controllers\TVSeriesController::returnLink($post->tvid) }}" target="_blank" style="color:black;background-color:white">{{$post->tvname}}</a></h3>
            </div>
        @endforeach
        <br>
        {{$posts ->links()}}
    @else
        <p>No entries found<p>
    @endif
@endsection