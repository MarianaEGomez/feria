<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                font-family: 'Figtree', sans-serif;
                color: #ffffff;
            }

            .background-layer {
                background-image: url('https://i.gifer.com/V5mt.gif'); 
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1; 
            }

            .gradient-custom {
                position: relative;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center; 
                align-items: center; 
                color: white;
                text-align: center;
                padding: 20px;
                box-sizing: border-box;
            }

            .title {
                font-size: 5vw; /* Tamaño relativo a la pantalla */
                line-height: 1.2;
                text-align: center;
                margin-bottom: 20px;
            }

            .description {
                font-size: 2vw; /* Tamaño relativo a la pantalla */
                max-width: 90%; /* Hacer que el texto sea más flexible */
                margin-bottom: 40px;
                padding: 0 10px;
            }

            .reserve-button {
                font-size: 16px;
                color: #fff;
                background-color: #28a745;
                border: none;
                padding: 15px 30px;
                border-radius: 8px;
                text-decoration: none;
                transition: background-color 0.3s ease;
                font-weight: bold;
            }

            .reserve-button:hover {
                background-color: #218838;
            }

            .logo-layer {
                background-image: url('/logo_feria/mate_sin_fondo.png');
                background-size: contain;
                background-repeat: no-repeat;
                height: 25vw;
                width: 25vw;
                max-width: 400px;
                max-height: 400px;
            }

            /* Media Query for Mobile Devices */
            @media (max-width: 768px) {
                .title {
                    font-size: 8vw; /* Ajustar tamaño del título en pantallas pequeñas */
                }

                .description {
                    font-size: 5vw; /* Ajustar tamaño de la descripción en pantallas pequeñas */
                }

                .reserve-button {
                    font-size: 14px; /* Reducir tamaño del texto del botón */
                    padding: 12px 25px; /* Ajustar padding */
                }

                .logo-layer {
                    height: 35vw; /* Ajustar el tamaño de la imagen en pantallas pequeñas */
                    width: 35vw;
                }
            }

            /* Media Query for Extra Small Devices */
            @media (max-width: 480px) {
                .title {
                    font-size: 10vw; /* Ajustar aún más el título en pantallas muy pequeñas */
                }

                .description {
                    font-size: 6vw; /* Ajustar la descripción en pantallas muy pequeñas */
                }

                .reserve-button {
                    font-size: 22px; /* Ajustar tamaño del texto del botón */
                    padding: 10px 20px; /* Ajustar el padding */
                }

                .logo-layer {
                    height: 45vw; /* Ajustar el tamaño de la imagen en dispositivos muy pequeños */
                    width: 45vw;
                }
            }
        </style>
    </head>

    <body>

        @include('layouts.navbar')

        <div class="background-layer"></div> 

        <div class="gradient-custom">

            <div class="logo-layer"></div>
            <div class="title">
                Fiesta en la Provincia
            </div>

            <div class="description">
                ¡Bienvenidos a la celebración más grande de la provincia! Únete a nosotros para disfrutar de una experiencia inolvidable llena de cultura, música y sabores únicos. 
                Reserva tu puesto y sé parte de esta increíble fiesta.
            </div>

            <a href="{{ route('reservas') }}" class="reserve-button">Reserva tu puesto ahora</a>

        </div>
    </body>
</html>
