<!-- resources/views/partials/navbar.blade.php -->
<style>
    /* Estilos básicos para el navbar */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background-color: transparent; /* Hacer transparente el fondo */
        overflow: hidden;
        padding: 10px 20px;
        display: flex;
        justify-content: flex-end; /* Alinear los botones a la derecha */
    }

    .navbar a {
        color: white;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
        font-size: 17px;
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transiciones suaves */
    }

    .navbar a:hover {
        transform: scale(1.2); /* Aumentar el tamaño un 10% */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3); /* Sombra para resaltar el botón */
        color: white; /* Mantener el color del texto */
    }

    .navbar a.active {
        background-color: /* Color para el botón activo */
        color: white;
    }

    .content {
        padding: 20px;
    }
</style>

<div class="navbar">
    <a href="{{ route('reservas') }}" class="{{ Request::routeIs('reservas') ? 'active' : '' }}">Reservas</a>
    <a href="{{ route('nosotros') }}" class="{{ Request::routeIs('nosotros') ? 'active' : '' }}">Nosotros</a>
    <a href="{{ route('faq') }}" class="{{ Request::routeIs('faq') ? 'active' : '' }}">Preguntas Frecuentes</a>
    <a href="{{ route('contactos') }}" class="{{ Request::routeIs('contactos') ? 'active' : '' }}">Contactos</a>
</div>
