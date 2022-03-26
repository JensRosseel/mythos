@extends('layouts.header')

@section('content')
    <h1>Mythos</h1>
    @foreach ($posts as $key => $post)
        <p>{{ $post->title }}</p>
    @endforeach
@endsection
