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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        
            <form action="{{ route('reservas_post') }}" method="POST" class="p-4 rounded-3 shadow bg-light">
                <h1 class="text-center mb-4">Reservar Puesto</h1>   
                @csrf
                    <div>
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                
                    <div>
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido">
                        @error('apellido') <span class="error">{{ $message }}</span> @enderror
                    </div>
                
                    <div>
                        <label for="cuil">CUIL</label>
                        <input type="text" id="cuil" name="cuil">
                        @error('cuil') <span class="error">{{ $message }}</span> @enderror
                    </div>
                
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono">
                        @error('telefono') <span class="error">{{ $message }}</span> @enderror
                    </div>
                
                    <div>
                        <label for="rubro">Rubro</label>
                        <select id="rubro" name="rubro">
                            <option value="">Seleccione un rubro</option>
                            @foreach ($rubros as $rubro)
                                <option value="{{ $rubro->id }}">{{ $rubro->description }}</option>
                            @endforeach
                        </select>
                        @error('rubro') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    {{-- <div>
                        <label for="producto">producto</label>
                        <input type="producto" id="producto" wire:model="producto">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div> --}}

                    {{-- <div>
                        <label for="pago">pagos</label>
                        <input type="pago" id="pago" wire:model="pago">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div> --}}

                    {{-- <div>
                        <label for="medio_de_pago">medios de pago</label>
                        <input type="medio_de_pago" id="medio_de_pago" wire:model="medio_de_pago">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div> --}}
                    {{-- <div>
                        <label for="reserva">reserva</label>
                        <input type="reserva" id="reserva" wire:model="reserva">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="reservation_date">Fecha de Reserva</label>
                        <input type="date" id="reservation_date" wire:model="reservation_date">
                        @error('reservation_date') <span class="error">{{ $message }}</span> @enderror
                    </div> --}}
            
                    <div class="mb-3">
                        <label for="puesto_ids" class="form-label">Seleccionar Puestos</label>
                        <select class="form-control" name="puesto_ids[]" id="puesto_ids" required>
                            @foreach ($puestos as $puesto)
                                <option value="{{ $puesto->id }}">
                                    {{ $puesto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div>
                        <label for="puesto_ubicacion">ubicacion del puesto</label>
                        <input type="puesto_ubicacion" id="puesto_ubicacion" wire:model="puesto_ubicacion">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                        
                    <div>
                        <label for="evento">evento</label>
                        <input type="evento"id="evento"wire:model="evento">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="sector_evento">Sector del evento</label>
                        <input type="sector_evento"id="sector_evento"wire:model="sector_evento">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                        <div>
                        <label for="localidad">localidad</label>
                        <input type="localidad"id="localidad"wire:model="localidad">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div> --}}

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg" aria-label="Reservar puesto">Reservar</button>
                    </div>
            </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
