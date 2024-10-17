<!DOCTYPE html>
<html>
<head>
    <title>Estado de tu reserva</title>
</head>
<body>
    <h1>Hola {{ $reservationPlace->persona->nombre }},</h1>

    <p>Tu reserva con ID {{ $reservationPlace->id }} ha sido {{ $status }}.</p>

    <p>Gracias por tu atención.</p>
</body>
</html>
