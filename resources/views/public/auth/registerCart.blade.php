@extends('layouts.base')
@section('assets')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form method="POST" action="/register" class="auth-wrapper">
        @csrf
        <div class="auth-container column">
            <h1 class="auth-heading"> Register </h1>
            <div class="username-container input-container">
                <span class="envelope-icon icon">
                    <i class="fas fa-male"></i>
                </span>
                <input type="text" placeholder="Username" name="name">
            </div>
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
            <div class="submit-container">
                <button type="submit" class="login-btn">Register</button>
            </div>
        </div>
    </form>

@endsection
