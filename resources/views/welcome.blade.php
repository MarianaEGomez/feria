<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                font-family: 'Figtree', sans-serif;
            }

            .background-layer {
                background-image: url('https://i.gifer.com/V5mt.gif'); /* GIF de fondo */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1; /* El GIF está detrás de todo */
            }

            .gradient-custom {
                position: relative;
                height: 100vh;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .logo-layer {
                background-image: url('/logo_feria/mate_sin_fondo.png'); /* Logo sobre el GIF */
                background-size: contain;
                background-position: left center; /* Alinea el logo a la izquierda */
                background-repeat: no-repeat;
                height:500px; /* Incrementa el tamaño del logo */
                width: 400px; /* Incrementa el tamaño del logo */
                position: absolute;
                top: 20px; /* Ajusta la posición vertical del logo */
                left: 150px; /* Alinea el logo a la izquierda */
                z-index: 1; /* El logo estará sobre el fondo */
            }

            .content {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                background-color: rgba(0, 0, 0, 0.6);
                padding: 40px;
                border-radius: 10px;
                text-align: center;
                color: white;
                margin-left: 430px;
            }

            .content h1 {
                font-size: 3
            }

            a {
                text-decoration: none;
            }

            /* Estilos compartidos por ambos botones (Google y Facebook) */
            .social-btn {
                background-color: #fff;
                border: none;
                padding: 10px 5px;
                display: flex;
                align-items: center;
                border-radius: 8px;
                cursor: pointer;
                width: 200px;
                justify-content: center;
                text-align: center;
                transition: background-color 0.3s ease;
            }

            .social-btn:hover {
                background-color: #f1f1f1;
            }

            .social-btn i {
                margin-right: 8px;
            }

            ._rbc {
                color: #000;
                font-size: 14px;
            }

            /* Iconos de Google y Facebook */
            .gg-ico svg, .fb-ico svg {
                width: 20px;
                height: 20px;
            }

            .gg-ico svg {
                fill: #4285F4;
            }

            .fb-ico svg {
                fill: #4267B2;
            }

            .blue-button {
                background-color: #1E3A8A;
                color: white;
                padding: 10px 5px;
                border-radius: 8px;
            }

            .text-blue-400 {
                color: #60A5FA;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    @include('layouts.navbar') 
                </div>
            </div>
        </nav>
        <div class="background-layer"></div> <!-- Fondo de fuegos artificiales (GIF) -->

        <div class="gradient-custom">
            <div class="logo-layer"></div> <!-- Logo sobre el fondo -->

            <div class="content">
                <!-- Botones de registro social -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <!-- Botón de Google -->
                    <div class="_k _aj _mo" data-login-type="gg">
                        <button class="social-btn" type="button" data-huejs="regwin-gg">
                            <i class="gg-ico">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                    <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"></path>
                                    <path fill="#FF3D00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691z"></path>
                                    <path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"></path>
                                    <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"></path>
                                </svg>
                            </i>
                            <span class="_rbc _tj _i6 _wt">Seguir usando Google</span>
                        </button>
                    </div>
                    <br>
                    <!-- Botón de Facebook con estilo similar -->
                    <div class="_k _aj _mo" data-login-type="fb">
                        <button class="social-btn" type="button" data-huejs="regwin-fb">
                            <i class="fb-ico">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M256 128C256 57.308 198.692 0 128 0C57.308 0 0 57.307 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.347-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.958 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"></path>
                                    <path class="_pbc" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A128.959 128.959 0 0 0 128 256a128.9 128.9 0 0 0 20-1.555V165h29.825"></path>
                                </svg>
                            </i>
                            <span class="_rbc _tj _i6 _wt">Seguir usando Facebook</span>
                        </button>
                    </div>
                </div>

                <!-- Separador -->
                <p class="my-4">O</p>

                <!-- Crear cuenta -->
                <a href="{{ route('register') }}" class="blue-button">Crear cuenta</a>

                <!-- Iniciar sesión -->
                <p class="mt-4">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-400">Inicia sesión</a></p>
            </div>
        </div>
    </body>
</html>
