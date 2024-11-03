<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Rectángulo de Aproximación</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>
    <div id="map" style="height: 500px; width: 100%;"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([-26.183, -58.168], 17);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

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

            // Coordenadas originales de cada plazoleta en forma de polígonos individuales
            var plazoletas = [
                [[-26.181808942024418, -58.16414522458315], [-26.18211703893546, -58.1651966505453], [-26.182194063035947, -58.165298574490606], [-26.18255029883846, -58.16628026301648]],
                [[-26.182579182774717, -58.1664036446345], [-26.18289690560103, -58.1674228840876], [-26.18294023137386, -58.167551630123775], [-26.184020963514506, -58.170772963175374]],
                [[-26.184082341099003, -58.17093389569998], [-26.18437599025884, -58.17189278544237], [-26.184400059832704, -58.172051035761534], [-26.18471416727215, -58.173058205258805]],
                [[-26.184909130082442, -58.17298176229981], [-26.18459743012466, -58.17199470935576], [-26.184517098046857, -58.171860598918855], [-26.184247518846735, -58.17088695702022]],
                [[-26.18420178659025, -58.170709931261776], [-26.183859997640685, -58.169755064839656], [-26.18378990809899, -58.16957207220132], [-26.183478205143295, -58.16861720578264]],
                [[-26.18348061211909, -58.16862122909626], [-26.183444507476946, -58.168457614341946], [-26.183117158202506, -58.16748129025658], [-26.18307262900042, -58.167316334412206]],
                [[-26.182750092668318, -58.166356103574905], [-26.182748889172874, -58.16635744467945], [-26.182694731859556, -58.166205899898635], [-26.182372194484774, -58.165229575790924]],
                [[-26.182303698213314, -58.165059151118925], [-26.181971531723317, -58.16409892027511]],
                [[-26.184020963514506, -58.170772963175374], [-26.18391402769408, -58.17068402735492], [-26.18378403239207, -58.17060408214269], [-26.18364397771003, -58.17052414793047]]
            ];

            plazoletas.forEach(function(coords) {
                L.polygon(coords, { color: 'green', fillColor: 'green', fillOpacity: 0.4 }).addTo(map);
            });

            // Crea un rectángulo que cubre la extensión aproximada de todas las plazoletas
            var plazoletaRectangle = L.rectangle([
                [-26.181808942024418, -58.16414522458315], // esquina superior izquierda
                [-26.184020963514506, -58.170772963175374]  // esquina inferior derecha
            ], {
                color: 'green',
                fillColor: 'green',
                fillOpacity: 0.2,
                weight: 1
            }).addTo(map);

            plazoletaRectangle.bindPopup("Área rectangular aproximada de las plazoletas");
        });
    </script>
</body>
</html>
