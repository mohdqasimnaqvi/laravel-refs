@extends('head')
@section('content')
    @foreach ($posts as $post)
        <article>
            <h2>{{$post->title}}</h2>
            <p>{{$post->description}}</p>
            <a href="/post/{{$post->id}}" class="btn">Read More</a>
        </article>
    @endforeach
@endsection
