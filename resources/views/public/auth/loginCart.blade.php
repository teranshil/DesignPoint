@extends('layouts.base')
@section('assets')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form method="POST" action="/login" class="auth-wrapper">
        @csrf
        <div class="auth-container column">
            <h1 class="auth-heading"> Login in</h1>
            <div class="social-container">
                <span class="facebook-icon social"><i class="fab fa-lg fa-facebook-f"></i></span>
                <span class="google-icon social"><i class="fab fa-lg fa-google"></i></span>
            </div>
            <span class="separation-heading">or use your account</span>
            <div class="email-container input-container">
                <span class="envelope-icon icon">
                    <i class="far fa-envelope"></i>
                </span>
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="password-container input-container">
                <span class="lock-icon icon">
                    <i class="fas fa-lock"></i>
                </span>
                <input class="password-input" type="password" name="password" placeholder="Password">
                <span class="eye-icon">
                    <i class="far fa-eye"></i>
                </span>
                <span class="closed-eye-icon hidden">
                    <i class="far fa-eye-slash"></i>
                </span>
            </div>
            <a href="/register" class="register-link"> Doesn't have an account? </a>
            <div class="submit-container">
                <button type="submit" class="login-btn">Log in</button>
            </div>
        </div>
    </form>
@endsection
