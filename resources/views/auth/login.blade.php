@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="max-width: 400px; margin: 0 auto;">
    <div class="card">
        <h2>Login</h2>
        
        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn" style="width: 100%;">Login</button>
        </form>

        <p style="margin-top: 1rem; text-align: center;">
            Don't have an account? <a href="{{ route('register') }}">Register here</a>
        </p>
    </div>
</div>
@endsection
