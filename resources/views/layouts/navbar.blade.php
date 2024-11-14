<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Toggle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5); /* Fondo negro con opacidad del 50% */
        }

        .navbar-nav .nav-link {
            color: white;
            border-radius: 10px;
            margin-right: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
        }

        .navbar-nav .nav-link:hover {
            transform: scale(1.2);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.548); 
            color: white; 
        }

        .navbar-nav .nav-link.active {
            color: white;
            background-color: #09ff007e; /* Color del botón */
        }

        .navbar-nav .nav-link {
            background-color: #ffffff; /* Color del botón */
        }

        .logo {
            height: 50px; /* Ajusta el tamaño del logo */
        }
        .navbar-brand {
            padding-left: 150px;
        }
        #navbarNav {
            padding-right: 150px;
        }
        .navbar-light .navbar-toggler {
            margin-right: 10px;
            background: antiquewhite;
        }

        @media (max-width: 767px) {
            .navbar-nav .nav-link {
                color: white;
                border-radius: 0px;
                margin-right: 0px;
                padding: 15px 15px;
                transition: transform 0.3s ease, box-shadow 0.3s ease; 
            }
            .navbar-brand {
                padding-left: 10px;
            }
            #navbarNav {
                padding-right: 0px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('/logo_feria/mate_sin_fondo.png') }}" alt="Logo" class="logo">
    </a>

    <!-- Botón de colapso para dispositivos móviles -->
    <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navegación -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('reservas') ? 'active' : '' }}" href="{{ route('reservas') }}">Reservas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('nosotros') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">Preguntas Frecuentes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('contactos') ? 'active' : '' }}" href="{{ route('contactos') }}">Contactos</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggler = document.querySelector('.navbar-toggler');
        const navbarNav = document.getElementById('navbarNav');

        toggler.addEventListener('click', function() {
            navbarNav.classList.toggle('show'); // Agrega o elimina la clase 'show'
        });
    });
</script>

</body>
</html>
