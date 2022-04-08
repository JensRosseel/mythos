@extends('layouts.header')
@section('content')
    <div class="account">
        <div class="container">
            <h1>Login</h1>

                @if ($message = Session::get('error'))
                    <strong>{{ $message }}</strong>
                @endif

                @if (count($errors) > 0)
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif

                <form method="post" action={{ route('checklogin') }}>
                    @csrf
                    <div class="form-items">
                        <label for="email">Enter Email</label>
                        <input type="email" name="email" />
                        <label for="password">Enter Password</label>
                        <input type="password" name="password" />
                    </div>
                    <input type="submit" name="login" value="Login" />
                </form>
                <a href={{ route('register') }}>Don't have an account? Sign up here!</a>
            </div>
        </div>
@endsection
