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
    <div class="postmaker">
        <form method="post" action={{ route('createpost') }}>
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br>
            <label for="norse">Norse</label>
            <input type="radio" name="tags" id="norse" value="norse" required>
            <label for="egyptian">Egyptian</label>
            <input type="radio" name="tags" id="egyptian" value="egyptian" required>
            <label for="greek">Greek</label>
            <input type="radio" name="tags" id="greek" value="greek" required>
            <label for="roman">Roman</label>
            <input type="radio" name="tags" id="roman" value="roman" required>
            <label for="hindu">Hindu</label>
            <input type="radio" name="tags" id="hindu" value="hindu" required>
            <label for="other">Other</label>
            <input type="radio" name="tags" id="other" value="other" required><br>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" required></textarea><br>
            <label for="author">Author</label>
            <input type="text" name="author" id="author" value={{ Auth::user()->username }} readonly>
            <input type="submit" value="Create">
        </form>
    </div>
@endsection
