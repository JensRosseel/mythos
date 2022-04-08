@extends('layouts.header')

@section('content')
    <div class="navbar">
        <h1>Mythos</h1>
        <div class="links">
            <a href={{ route('home') }}>Home</a>
        </div>
    </div>
    <div class="profile">
        @if(Auth::check())
            <a href="">
                <img class="profile" src={{ asset('images/account.png') }} alt=""/></br>
                Welcome, {{ Auth::user()->username }}
            </a><br>
            <a href={{ route('logout') }}>Logout</a>
        @else
                <a href={{ route('login') }}><img class="profile" src={{ asset('images/account.png') }} alt=""/></a>
        @endif

    </div>
    <div class="posts">
        @foreach ($posts as $key => $post)
            <div class="post">
                <div class="title">{{ $post->title }}</div>
                <div class="origin">
                    <div class="tag">{{ $post->origin }}</div>
                </div>
                <div class="description">
                    {{ $post->description }}
                </div>
                <div class="author">author: {{ $post->author }}</div>
            </div>
        @endforeach
    </div>
    @if(Auth::check())
    <button id="postmaker-button" class="postmaker-button">Create Post</button>
    <div id="postmaker" class="postmaker">
        <form method="post" action={{ route('createpost') }}>
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br>
            <label for="origin">Origin:</label>
            <input type="text" name="origin" id="origin" required><br>
            <label for="description">Description:</label><br>
            <textarea name="description" id="description" required></textarea><br>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value={{ Auth::user()->username }} readonly>
            <input type="submit" value="Create">
            <button id="close">Close</button>
        </form>
    </div>
    @endif
    <script src={{ asset('js/script.js') }}></script>
@endsection
