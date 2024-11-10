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
    <div id="map" style="height: 500px; width: 100%;"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([-26.183, -58.168], 17);

            // Capa de mapa base
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            // Inicializar las herramientas de dibujo
            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);

            var drawControl = new L.Control.Draw({
                edit: {
                    featureGroup: drawnItems
                },
                draw: {
                    polygon: true, // Habilita la herramienta para dibujar polígonos
                    polyline: false,
                    rectangle: false,
                    circle: false,
                    marker: false,
                    circlemarker: false
                }
            });
            map.addControl(drawControl);

            // Evento para capturar el polígono dibujado
            map.on(L.Draw.Event.CREATED, function (event) {
                var layer = event.layer;
                drawnItems.addLayer(layer);
                
                // Obtener las coordenadas del polígono dibujado
                var coordinates = layer.getLatLngs();
                console.log("Coordenadas del polígono:", coordinates);
                alert("Coordenadas del polígono capturadas. Ver consola para detalles.");
            });

            var plazaSanMartinPolygon = L.polygon([
                [-26.18384806390851, -58.17366090494948],
                [-26.184617039793153, -58.175954452216814],
                [-26.186636643513303, -58.175097227870125],
                [-26.1858838797941, -58.172802598047944]
            ], {
                color: 'blue',
                fillColor: '#3399ff',
                fillOpacity: 0.5
            }).addTo(map);
            plazaSanMartinPolygon.bindPopup("Plaza San Martín, Formosa");

            // Coordenadas de cada plazoleta en forma de polígonos individuales
        });
    </script>
</body>
</html>
