@extends('layouts.header')
@section('content')
    <div class="account">
        <div class="container">
            <h1>Register</h1>

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

            <form action={{ route('registration') }} method="post">
                @csrf
                <div class="form-items">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>

                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" required>

                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" required>

                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" required>

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>

                    <label for="password_confirmation">Password Confirmation:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                <input type="submit" name="register" value="Register" />
            </form>
        </div>

    </div>
@endsection
