@extends('layouts.header')

@section('content')
    <div class="account">
        <div class="account-details">
            <p>Username: {{ Auth::user()->username }}</p>
            <p>E-Mail: {{ Auth::user()->email }}</p>
            <p>First Name: {{ Auth::user()->first_name }}</p>
            <p>Last Name: {{ Auth::user()->last_name }}</p>
            <p>Time of Account Creation:<br>{{ Auth::user()->created_at }}</p>
            <a href={{ route('home') }}>Back to home</a>
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
    </div>
@endsection
