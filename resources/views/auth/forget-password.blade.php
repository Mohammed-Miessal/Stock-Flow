@extends('layouts.auth')
@section('content')
    <form action="{{ route('forget-password.post') }}" class="login__form" method="post">
        @csrf

        <h1 class="login__title">Forgot Password</h1>

        <div class="login__content">
            <p class="login__register">
                Have you forgotten your password? <br>
                Enter your email address to reset your password.
            </p>
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input name="email" type="email" required class="login__input" id="login-email" placeholder=" "
                        autocomplete="off">
                    <label for="login-email" class="login__label"> Email</label>
                </div>
            </div>
            {{-- Message Erreur  --}}
            @if ($errors->has('email'))
                <div class="alert ">
                    {{ $errors->first('email') }}
                </div>
            @endif

            @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif
        

        </div>


        <button type="submit" class="login__button">EMAIL PASSWORD RESET LINK</button>


    </form>
@endsection
