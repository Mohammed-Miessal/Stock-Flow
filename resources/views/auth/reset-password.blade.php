@extends('layouts.auth')
@section('content')
    <form action="{{ route('reset-password.post', $token) }}" class="login__form" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <h1 class="login__title">Reset Password</h1>

        <div class="login__content">
            <p class="login__register">
                Enter your new password
            </p>
            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input type="password" required class="login__input text-black" id="login-pass" name="password">
                    <label for="login-pass" class="login__label">Password</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                </div>
            </div>
            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input type="password" required class="login__input" id="login-pass" name="password_confirmation">
                    <label for="login-pass" class="login__label">Confirm Password</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                </div>
            </div>

            @if (session('error'))
                <div class="alert ">
                    {{ session('error') }}
                </div>
            @endif

        </div>


        <button type="submit" class="login__button"> PASSWORD RESET </button>


    </form>
@endsection
