@extends('layouts.main')
@section('content')
    <div>
        <div><a class="btn btn-primary mb-3" href="{{ route('post.create') }}">Create post</a></div>
        @foreach($posts as $post) 
            <a href="{{ route('post.show', $post->id) }}">
                <div> {{$post->id }}. {{ $post->title }} </div>
            </a>
        @endforeach
    </div>
@endsection