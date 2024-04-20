@extends('layouts.auth')
@section('content')
    <form action="{{ route('login.post') }}" class="login__form" method="post">
        @csrf
        <h1 class="login__title">Login</h1>

        {{-- Credentials for testing: --}}

        <div class="login__content">

            {{-- Email --}}

            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>
                <div class="login__box-input">
                    <input type="email" name="email" required class="login__input" id="login-email" autocomplete="off">
                    <label for="login-email" class="login__label">Email</label>
                </div>
            </div>

            {{-- Password --}}

            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>
                <div class="login__box-input">
                    <input name="password" type="password" required class="login__input" id="login-pass">
                    <label for="login-pass" class="login__label">Password</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                </div>
            </div>

        </div>

        {{-- Message Erreur  --}}
        @if ($errors->has('email'))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
        @endif

        <div class="login__check">
            <div class="login__check-group">
                <!-- <input type="checkbox" class="login__check-input" id="login-check">
                        <label for="login-check" class="login__check-label">Remember me</label> -->
            </div>
            <a href="{{ route('forget-password') }}" class="login__forgot">Forgot Password?</a>
        </div>


        <button type="submit" class="login__button">LOGIN</button>

        <!-- <p class="login__register">
                Don't have an account? <a href="#">Register</a>
            </p> -->
    </form>
@endsection
