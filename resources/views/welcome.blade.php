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
                justify-content: center; /* Centra horizontalmente */
                align-items: center; /* Centra verticalmente */
                color: white;
                gap: 20px; /* Menor separación entre el logo y el texto */
            }

            .logo-layer {
                background-image: url('/logo_feria/mate_sin_fondo.png'); /* Logo sobre el GIF */
                background-size: contain;
                background-repeat: no-repeat;
                height: 500px; /* Tamaño del logo aumentado */
                width: 500px;
            }

            /* Estilo para el título */
            .title {
                font-size: 80px; /* Aumentar el tamaño del texto */
                line-height: 1.2;
                text-align: left; /* Alinea el texto a la izquierda */
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
            <!-- Título a la izquierda -->
            <div class="title">
                Fiesta<br>en<br>la<br>Provincia
            </div>

            <!-- Logo a la derecha -->
            <div class="logo-layer"></div>
        </div>
    </body>
</html>
