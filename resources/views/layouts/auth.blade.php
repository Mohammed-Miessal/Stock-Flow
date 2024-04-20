<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo_fil_rouge.svg" type="image/x-icon">
  

    <!--=============== REMIXICONS ICONS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/icons/fonts/remixicon.css') }}">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/css/auth_forms.css') }}">

    <title> EcoStock </title>

</head>

<body>


    <div class="login">
        <img src="{{ asset('assets/img/bg-login.png') }}" alt="login image" class="login__img" id="loginImage">

        <div class="container">

            <div class="nav-header">
                @include('components.auth-header')
            </div>

            <!-- Content  -->
            @yield('content')
            <!-- / Content  -->


        </div>

    </div>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('assets/js/auth_forms.js') }}"></script>
</body>

</html>
