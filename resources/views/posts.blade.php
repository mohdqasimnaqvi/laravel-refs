@extends('head')
@section('content')
{{-- @dd($categories) --}}
@include('_header')

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    <x-cards-layout-grid :posts="$posts" />
    {{ $posts->links() }}
</main>
@endsection
