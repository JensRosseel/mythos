@extends('layouts.header')

@section('content')
    <div class="navbar">
        <div class="profile">
            @if(Auth::check())
                <a href="">
                    <img class="profile" src={{ asset('images/account.png') }} alt=""/></br>
                    Welcome, {{ Auth::user()->username }}
                </a><br>
                <a href={{ route('logout') }}>Logout</a>
            @else
                <button type="button" class="collapsible">
                    <a href={{ route('login') }}><img class="profile" src={{ asset('images/account.png') }} alt=""/></a>
                </button>
            @endif

        </div>
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
