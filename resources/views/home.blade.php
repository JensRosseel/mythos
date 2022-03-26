@extends('layouts.header')

@section('content')
    <div class="navbar">
        <h1>Mythos</h1>
        <div class="links">
            <a href={{ route('home') }}>Home</a>
        </div>
    </div>
    <div class="posts">
        @foreach ($posts as $key => $post)
            <div class="post">
                <div class="title">{{ $post->title }}</div>
                <div class="tags">
                    @if (str_contains($post->tags, ','))
                        {{ $data = explode(',', $post->tags) }}
                        @foreach ($data as $key => $tag)
                            <div class="tag">{{ $tag }}</div>
                        @endforeach
                    @else
                        <div class="tag">{{ $post->tags }}</div>
                    @endif
                </div>
                <div class="description">
                    {{ $post->description }}
                </div>
                <div class="author">author: {{ $post->author }}</div>
            </div>
        @endforeach
    </div>
@endsection
