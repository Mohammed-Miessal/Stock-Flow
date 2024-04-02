<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ICONS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/icons/fonts/remixicon.css') }}">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/css/auth_forms.css') }}">

    {{-- @vite('resources/css/app.css')  --}}
    <title> Authentification </title>

    <script>
        // Fonction pour détecter si le thème du système est sombre
        function isSystemDarkMode() {
            return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        }

        const loginImageDark = "{{ asset('assets/img/bg-login-dark-mode.jpg') }}";
        const loginImageLight = "{{ asset('assets/img/bg-login-white-mode.jpg') }}";

        // Charger une image en fonction du thème du système
        document.addEventListener('DOMContentLoaded', function() {
            const loginImage = document.getElementById('loginImage');
            if (isSystemDarkMode()) {
                loginImage.src = loginImageDark;
            } else {
                loginImage.src = loginImageLight;
            }
        });
    </script>

</head>

<body>


    <div class="login">
        <img src="{{ asset('assets/img/bg-login-white-mode.jpg') }}" alt="login image" class="login__img"
            id="loginImage">

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
