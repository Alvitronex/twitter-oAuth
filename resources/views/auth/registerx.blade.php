<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Twitter</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- estilos de login -->
    <style>
        .loginappx {
            background-color: black;

        }

        .container {
            width: 400px;
            padding: 5px;
            text-align: center;
            margin-right: 35%;
            margin-left: 35%;
            margin-top: 5%;
            background-color: white;
            font-family: sans-serif;
            font-weight: 800;
            border-radius: 15px;
        }

        .text1loginappx {
            text-align: center;
            font-size: 30px;
        }

        .login-register {
            border: 2px;
            margin: 5px;

        }

        .loginx {
            border-radius: 15px;
            background-color: aliceblue;
            color: black;
            margin: 5px;
            font-size: 20px;
            padding: 1px;
        }

        a {

            color: inherit;
            text-decoration: inherit
        }

        .loginx img {
            height: 35px;
            vertical-align: middle;
            margin-right: 5px;
        }

        .createCount {
            border-radius: 15px;
            background-color: lightseagreen;
            color: black;
            margin: 5px;
            height: 35px;
            text-align: center;
        }

        .log-in {
            border-radius: 15px;
            background-color: black;
            color: white;
            height: 35px;
            margin: 5px;
        }
    </style>

<body class="loginappx">
    <div class="container">
        <!-- logo de la app para autentificarse -->
        <div class="text1loginappx">
            <img src="https://th.bing.com/th/id/OIP.ZweGejPwbT5wwshQ2-8qUQHaHa?w=184&h=184&c=7&r=0&o=5&pid=1.7" alt="">
            <br>
            Ahora puedes iniciar sesion con
            <br>
            <br>
        </div>

        <div class="login-register">

            <div class="loginx">
                <!-- creacion de ruta para redireccionarse a oAuth de la plataforma X -->
                <a
                    href="{{route('auth.redirect')}}">
                    {{ __('Login with ') }}
                    <img src="https://th.bing.com/th/id/OIP.ZweGejPwbT5wwshQ2-8qUQHaHa?w=184&h=184&c=7&r=0&o=5&pid=1.7" alt="">
                </a>
            </div>
            <!-- Se coloca campo login por default de laravel para logearse mediante credenciales de laravel almacenadas -->
            <div class="log-in">
                <a
                    href="{{ route('login') }}">
                    {{ __('Login with your count?') }}
                </a>
            </div>
            <!-- Se coloca campo creacion de cuenta por default de laravel para crear cuenta mediante logica brindada por Brezee de laravel y poderlos almacenadas -->
            <div class="createCount">
                <a
                    href="{{ route('register') }}">
                    {{ __('Create a count with us?') }}
                </a>
            </div>


        </div>


</body>