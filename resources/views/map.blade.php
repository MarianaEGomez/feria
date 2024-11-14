<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
</head>
<body>
    <button id="savePolygonsBtn">Guardar polígonos</button>
    <div id="map" style="height: 90vh; width: 100%;"></div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([-26.183, -58.168], 17);
    
            // Capa de mapa base
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
    
            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);
    
            var drawControl = new L.Control.Draw({
                edit: {
                    featureGroup: drawnItems
                },
                draw: {
                    polygon: true,
                    polyline: false,
                    rectangle: false,
                    circle: false,
                    marker: false,
                    circlemarker: false
                }
            });
            map.addControl(drawControl);
    
            // Array para almacenar temporalmente los polígonos dibujados
            var polygons = [];
    
            // Evento para capturar el polígono dibujado
            map.on(L.Draw.Event.CREATED, function (event) {
                var layer = event.layer;
                drawnItems.addLayer(layer);
    
                // Obtener las coordenadas del polígono y agregarlas al array de polígonos
                var coordinates = layer.getLatLngs().map(latlng => latlng.map(point => ({ lat: point.lat, lng: point.lng })));
                polygons.push(coordinates);
            });
    
            // Cargar y mostrar los polígonos guardados al cargar el mapa
            fetch('/api/polygons')
                .then(response => response.json())
                .then(data => {
                    data.forEach(polygonData => {
                        var polygonCoordinates = polygonData.coordinates.map(latlngArray => latlngArray.map(point => [point.lat, point.lng]));
    
                        // Crear y agregar el polígono al mapa
                        var polygon = L.polygon(polygonCoordinates, {
                            color: 'green',
                            fillColor: '#00ff00',
                            fillOpacity: 0.5
                        }).addTo(drawnItems);
    
                        polygon.bindPopup(`Polígono ID: ${polygonData.id}`);
                    });
                })
                .catch(error => console.error('Error al cargar los polígonos:', error));
    
            // Evento para guardar los polígonos cuando se hace clic en el botón
            document.getElementById('savePolygonsBtn').addEventListener('click', function () {
                if (polygons.length === 0) {
                    alert("No hay polígonos para guardar.");
                    return;
                }
    
                // Enviar los polígonos al backend
                fetch('/api/polygons', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ polygons: polygons })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    alert("Polígonos guardados exitosamente");
                    polygons = []; // Limpiar el array de polígonos después de guardarlos
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>

</body>
</html>
