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
    <button class="postmaker-button">Create Post</button>
    <div class="postmaker">
        <form method="post" action={{ route('createpost') }}>
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br>
            <label for="norse">Norse</label>
            <input type="radio" name="origin" id="norse" value="norse" required>
            <label for="egyptian">Egyptian</label>
            <input type="radio" name="origin" id="egyptian" value="egyptian" required>
            <label for="greek">Greek</label>
            <input type="radio" name="origin" id="greek" value="greek" required>
            <label for="roman">Roman</label>
            <input type="radio" name="origin" id="roman" value="roman" required>
            <label for="hindu">Hindu</label>
            <input type="radio" name="origin" id="hindu" value="hindu" required>
            <label for="other">Other</label>
            <input type="radio" name="origin" id="other" value="other" required><br>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" required></textarea><br>
            <label for="author">Author</label>
            <input type="text" name="author" id="author" value={{ Auth::user()->username }} readonly>
            <input type="submit" value="Create">
        </form>
    </div>
    @endif
@endsection
