<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - Feria de Feriantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gradient-custom {
            background-image: url('/fondo_foto/costanera.jpeg') !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: white;
        }
        .content-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
            color: #333;
        }

        h1, h3 {
            color: #222;
        }

        p, ul li {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="gradient-custom d-flex flex-column min-vh-100">
        @include('layouts.navbar')
        <div class="container mt-4">
            <div class="content-container">
                <h1 class="mb-4">¡Bienvenidos a nuestro sistema de registro de feriantes!</h1>
                <p>Somos una plataforma diseñada para facilitar la participación de feriantes en eventos importantes, como fechas patrias y otras celebraciones clave.</p>
                <p>Nuestro objetivo es ofrecer una solución sencilla y eficiente para que los comerciantes puedan reservar sus puestos y organizarse de manera cómoda para estos eventos tan esperados.</p>

                <h3>¿Qué ofrecemos?</h3>
                <ul>
                    <li><strong>Reserva fácil de puestos:</strong> A través de nuestra plataforma, los feriantes pueden consultar la disponibilidad de espacios y reservar su lugar de manera anticipada, asegurando su participación en los eventos más destacados de la región.</li>
                    <li><strong>Gestión eficiente:</strong> Cada evento cuenta con sectores organizados y ubicaciones detalladas, lo que permite a los feriantes seleccionar el puesto que mejor se ajuste a sus necesidades.</li>
                    <li><strong>Accesibilidad para todos:</strong> Hemos diseñado el sistema pensando en la facilidad de uso, para que tanto feriantes experimentados como nuevos participantes puedan acceder y hacer sus reservas sin complicaciones.</li>
                </ul>

                <h3>Nuestra misión</h3>
                <p>Queremos ser el puente entre los organizadores de eventos y los feriantes, facilitando la gestión de los puestos y promoviendo el comercio local en fechas patrias y otras celebraciones importantes. Creemos que el éxito de un evento depende de la organización, y con nuestra plataforma buscamos aportar una solución tecnológica moderna y eficiente para todos.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
