<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gradient-custom {
            background-image: url('/fondo_foto/costanera.jpeg') !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: black;
        }
    </style>
</head>
<body>
    <div class="gradient-custom d-flex flex-column min-vh-100">
        @include('layouts.navbar')
        <div class="container my-5">
            {{-- Muestra errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                    {{-- Formulario para reservar puestos --}}
        <form action="{{ route('reservas') }}" method="POST" class="p-4 rounded-3 shadow bg-light">
            <h1 class="text-center mb-4">Reservar Puesto</h1>   
            @csrf
            <div>
                <label for="name">Nombre</label>
                <input type="text" id="name" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" wire:model="apellido">
                @error('apellido') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="cuil">CUIL</label>
                <input type="text" id="cuil" wire:model="cuil">
                @error('cuil') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" wire:model="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Select para rubro --}}
            <div>
                <label for="rubro">Rubro</label>
                <select id="rubro" wire:model="rubro">
                    <option value="">Seleccione un rubro</option>
                    <option value="Comida">Comida</option>
                    <option value="Bebidas">Bebidas</option>
                    <option value="Artesanías">Artesanías</option>
                    <option value="Ropa">Ropa</option>
                </select>
                @error('rubro') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Select para producto según el rubro --}}
            <div>
                <label for="producto">Producto</label>
                <select id="producto" wire:model="producto">
                    <option value="">Seleccione un producto</option>
                    @if($rubros == 'Comida')
                        <option value="Empanadas">Empanadas</option>
                        <option value="Pizza">Pizza</option>
                        <option value="Hamburguesas">Hamburguesas</option>
                    @elseif($rubros == 'Bebidas')
                        <option value="Gaseosas">Gaseosas</option>
                        <option value="Cerveza">Cerveza</option>
                        <option value="Jugos">Jugos</option>
                    @elseif($rubros == 'Artesanías')
                        <option value="Cuero">Cuero</option>
                        <option value="Madera">Madera</option>
                    @elseif($rubros == 'Ropa')
                        <option value="Camisas">Camisas</option>
                        <option value="Pantalones">Pantalones</option>
                    @endif
                </select>
                @error('producto') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Select para medios de pago --}}
            <div>
                <label for="medio_de_pago">Medios de Pago</label>
                <select id="medio_de_pago" wire:model="medio_de_pago">
                    <option value="">Seleccione un medio de pago</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                    <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                </select>
                @error('medio_de_pago') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Select para evento --}}
            <div>
                <label for="evento">Evento</label>
                <select id="evento" wire:model="evento">
                    <option value="">Seleccione un evento</option>
                    <option value="Fiesta de la Corvina">Fiesta de la Corvina</option>
                    <option value="Fiesta del Pomelo">Fiesta del Pomelo</option>
                    <option value="Fiesta del Río, Mate y Tereré">Fiesta del Río, Mate y Tereré</option>
                </select>
                @error('evento') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Select para sector del evento según el evento seleccionado --}}
            <div>
                <label for="sector_evento">Sector del Evento</label>
                <select id="sector_evento" wire:model="sector_evento">
                    <option value="">Seleccione un sector</option>
                    @if($evento == 'Fiesta del Río, Mate y Tereré')
                        <option value="Plaza San Martín">Plaza San Martín</option>
                        <option value="Avenida">Avenida</option>
                        <option value="Costanera">Costanera</option>
                    @else
                        <option value="Avenida">Avenida</option>
                    @endif
                </select>
                @error('sector_evento') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Select para localidad --}}
            <div>
                <label for="localidad">Localidad</label>
                <select id="localidad" wire:model="localidad">
                    <option value="">Seleccione una localidad</option>
                    <option value="Formosa">Formosa</option>
                    <option value="Herradura">Herradura</option>
                    <option value="Laguna Blanca">Laguna Blanca</option>
                </select>
                @error('localidad') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Botón para enviar el formulario --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg" aria-label="Reservar puesto">Reservar</button>
            </div>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
