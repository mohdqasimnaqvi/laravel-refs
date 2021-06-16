@extends('head')
@section('content')
    <div class="post">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <a href="/" class="btn">Go Back</a>
    </div>
@endsection
