<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservas</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

        <style>
            .gradient-custom {
                background-image: url('/fondo_foto/costanera.jpeg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                min-height: 100vh;
                color: black;
            }
            .form-step { display: none; }
            .form-step-active { display: block; }
    
            /* Estilos para los pasos y flechas */
            .steps {
                display: flex;
                justify-content: center;
                margin-bottom: 30px;
            }
    
            .step {
                position: relative;
                padding: 10px;
                text-align: center;
                flex: 1;
                font-weight: bold;
                font-size: 1.2rem;
            }
    
            .step:before {
                content: '►';
                position: absolute;
                right: -15px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 1.5rem;
            }
    
            .step:last-child:before {
                content: '';
            }
    
            .step-active {
                color: #0d6efd;
            }
    
            .step-completed {
                color: #28a745;
            }
    
            /* Estilo del mapa */
            #map {
                height: 300px;
                margin-top: 20px;
                display: none;
            }
            .clase-baseline{
                align-items: baseline !important;
            }
        </style>
    </head>
    
<body>
    <div class="gradient-custom d-flex flex-column min-vh-100">
        @include('layouts.navbar')
        <div class="container my-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
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

            <form id="reservationForm" action="{{ route('reservas_post') }}" method="POST" class="p-4 rounded-3 shadow bg-light">
                <h1 class="text-center mb-4">Reservar Puesto</h1>   
                @csrf

                <!-- Indicadores de pasos -->
                <div class="steps">
                    <div class="step step-1" id="step-1">Paso 1</div>
                    <div class="step" id="step-2">Paso 2</div>
                    <div class="step" id="step-3">Paso 3</div>
                </div>

                <!-- Paso 1: Información Personal -->
                <div class="form-step form-step-active">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" required>
                        @error('apellido') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cuil" class="form-label">CUIL</label>
                        <input type="text" id="cuil" name="cuil" class="form-control" required>
                        @error('cuil') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" required>
                        @error('telefono') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <button type="button" class="btn btn-primary" onclick="nextStep()">Siguiente</button>
                </div>
                <!-- Mapa de OpenStreetMap -->
                <div id="map"></div>  
                <!-- Paso 2: Rubro y Puesto -->
                <div class="form-step">

                    <div class="mb-3">
                        <label for="sector_id" class="form-label">Seleccionar Zona</label>
                        <select class="form-select" name="sector_id" id="sector_id" required onchange="filterPuestos()">
                            <option value="">Selecciona una zona</option>
                            @foreach ($sectores as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="puesto_ids" class="form-label">Seleccionar Puestos</label>
                        
                        @if ($puestosDisponibles === 0)
                            <div class="alert alert-danger">
                                No hay puestos disponibles. Por favor, verifica si hay disponibilidad en otra zona.
                            </div>
                        @endif
                        
                        <select class="form-select" name="puesto_ids[]" id="puesto_ids" required onchange="updateTotalPago()">
                            <option value="">Seleccione un puesto</option>
                            @foreach ($puestos as $puesto)
                                <option value="{{ $puesto->id }}" data-sector-id="{{ $puesto->sector_id }}" data-costo="{{ $puesto->costo }}"
                                    style="display: none; color: {{ $puesto->disponibilidad ? 'green' : 'red' }};">
                                    {{ $puesto->nombre }} - ${{ $puesto->costo }}
                                    ({{ $puesto->disponibilidad ? 'Disponible' : 'No Disponible' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rubro" class="form-label">Rubro</label>
                        <select id="rubro" name="rubro" class="form-select" required>
                            <option value="">Seleccione un rubro</option>
                            @foreach ($rubros as $rubro)
                                <option value="{{ $rubro->id }}">{{ $rubro->description }}</option>
                            @endforeach
                        </select>
                        @error('rubro') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Atrás</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep()">Siguiente</button>
                </div>

                <!-- Paso 3: Método de Pago -->
                <div class="form-step">

                    <div class="mb-3">
                        <label for="total_a_pagar" class="form-label">Total a Pagar</label>
                        <div class="d-flex clase-baseline">
                            <p>$</p>
                            <input type="text" id="total_a_pagar" name="total_a_pagar" class="form-control" readonly>
                        </div>
                        
                    </div>

                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Atrás</button>
                    <button type="submit" class="btn border border-dark shadow-lg">
                        <img src="{{ asset('fondo_foto/mp.png') }}" alt="Mercado Pago" style="width: 24px; height: 24px; margin-right: 8px;">
                        Reservar
                    </button>
                </div>
   
            </form>

        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
   let map; 

   document.addEventListener("DOMContentLoaded", function() {
        map = L.map('map').setView([-26.184, -58.173], 13);


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        let currentPolygon;

        document.getElementById('sector_id').addEventListener('change', function() {
            const sectorId = this.value;
            const selectedSector = @json($sectores).find(sector => sector.id == sectorId);

            if (selectedSector && selectedSector.polygon) {
                try {
                    const coordenadas = JSON.parse(selectedSector.polygon.coordinates)[0];

                    if (currentPolygon) {
                        map.removeLayer(currentPolygon);
                    }

                    if (coordenadas.length > 0) {
                        const latLngs = coordenadas.map(coord => [coord.lat, coord.lng]);

                        currentPolygon = L.polygon(latLngs, {
                            color: 'blue', 
                            fillColor: 'rgba(0, 0, 255, 0.3)', 
                            fillOpacity: 0.3,
                        }).addTo(map);

                        map.fitBounds(currentPolygon.getBounds());
                    }
                } catch (error) {
                    console.error("Error al parsear las coordenadas:", error);
                }
            }
        });
    });

  </script>
  

    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll(".form-step");
        const stepLabels = document.querySelectorAll(".step");

        function showStep(step) {
            steps.forEach((el, index) => {
                el.classList.toggle("form-step-active", index === step);
            });
            stepLabels.forEach((label, index) => {
                label.classList.remove("step-active", "step-completed");
                if (index < step) {
                    label.classList.add("step-completed");
                } else if (index === step) {
                    label.classList.add("step-active");
                }
            });

            const mapDiv = document.getElementById("map");
            if (step === 1) {
                mapDiv.style.display = "block";
                setTimeout(() => {
                    map.invalidateSize();
                }, 100); 
            } else {
                mapDiv.style.display = "none";
            }
        }

        function nextStep() {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        }

        showStep(currentStep);

            function updateTotalPago() {
            const select = document.getElementById('puesto_ids');
            const selectedOption = select.options[select.selectedIndex];
            const costo = selectedOption.getAttribute('data-costo');
            document.getElementById('total_a_pagar').value = `${costo}`;
        }

        updateTotalPago();

        function filterPuestos() {
            const sectorId = document.getElementById('sector_id').value;
            const puestosSelect = document.getElementById('puesto_ids');
            

            for (const option of puestosSelect.options) {
                option.style.display = 'none';
            }


            if (sectorId) {
                for (const option of puestosSelect.options) {
                    const optionSectorId = option.getAttribute('data-sector-id');
                    if (optionSectorId === sectorId) {
                        option.style.display = 'block';
                    }
                }
            
                puestosSelect.selectedIndex = -1;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            filterPuestos();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
