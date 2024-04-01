@extends('layouts.auth')
@section('content')
    <form action="" class="login__form">
        <h1 class="login__title">Reset Password</h1>

        <div class="login__content">
            <p class="login__register">
               Enter your new password  
            </p>
            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input type="password" required class="login__input text-black" id="login-pass">
                    <label for="login-pass" class="login__label">Password</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                </div>
            </div>
            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input type="password" required class="login__input" id="login-pass">
                    <label for="login-pass" class="login__label">Confirm Password</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                </div>
            </div>
        </div>


        <button type="submit" class="login__button"> PASSWORD RESET </button>


    </form>
@endsection
