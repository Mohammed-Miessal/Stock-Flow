@extends('layouts.auth')
@section('content')
    <form action="" class="login__form">
        <h1 class="login__title">Forgot Password</h1>

        <div class="login__content">
            <p class="login__register">
                Have you forgotten your password? <br>
                Enter your email address to reset your password.
            </p>
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input type="email" required class="login__input" id="login-email" placeholder=" ">
                    <label for="login-email" class="login__label"> Email</label>
                </div>
            </div>
        </div>


        <button type="submit" class="login__button">EMAIL PASSWORD RESET LINK</button>


    </form>
@endsection
