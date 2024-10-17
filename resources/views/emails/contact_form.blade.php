<!DOCTYPE html>
<html>
<head>
    <title>Nuevo mensaje de contacto</title>
</head>
<body>
    <h1>Nuevo mensaje de contacto</h1>
    <p><strong>Nombre:</strong> {{ $contactData['nombre'] }}</p>
    <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
    <p><strong>Asunto:</strong> {{ $contactData['asunto'] }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $contactData['mensaje'] }}</p>
</body>
</html>
