<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Places</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 1.5em; 
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-15 ml-10">
        <div class="menu-lateral">
            @include('components.welcome')
        </div>

        <div class="contenido">
            <h1>Lista de Reservas</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rubro</th>
                        <th>Puesto</th>
                        <th>Sector</th>
                        <th>Evento</th>
                        <th>Localidad</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>CUIL</th>
                        <th>Email</th>
                        <th>Teléfono</th> 
                        <th>Aprobado</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservationPlaces as $reservationPlace)
                        <tr>
                            <td>{{ $reservationPlace->id }}</td>
                            <td>{{ $reservationPlace->rubro->description ?? 'N/A' }}</td>
                            <td>{{ $reservationPlace->puesto->nro_puesto ?? 'N/A' }}</td>
                            <td>{{ $reservationPlace->puesto->sectorEvento->descripcion ?? 'N/A' }}</td>
                            <td>{{ $reservationPlace->puesto->sectorEvento->evento->descripcion ?? 'N/A' }}</td>
                            <td>{{ $reservationPlace->puesto->sectorEvento->evento->localidad->descripcion ?? 'N/A' }}</td>
                            <td>{{ $reservationPlace->persona->nombre ?? 'N/A' }}</td>
                            <td>{{ $reservationPlace->persona->apellido ?? 'N/A' }}</td>
                            <td>{{ $reservationPlace->persona->cuil ?? 'N/A' }}</td>
                            <td>{{ $reservationPlace->persona->contacto->email ?? 'N/A' }}</td> 
                            <td>{{ $reservationPlace->persona->contacto->telefono ?? 'N/A' }}</td> 
                            <td>
                                @if ($reservationPlace->approved === 1)
                                    Aprobado
                                @elseif ($reservationPlace->approved === 2)
                                    Rechazado
                                @else
                                    <form action="{{ route('reservation.approve', $reservationPlace->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="button" title="Aprobar">✓</button>
                                    </form>
                                    <form action="{{ route('reservation.reject', $reservationPlace->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="button" title="Rechazar">✗</button>
                                    </form>
                                @endif
                            </td>
                            <td>{{ $reservationPlace->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(session('success'))
            <div style="font-size: 20px">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>
</html>
