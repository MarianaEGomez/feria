<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes - Feria de Feriantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gradient-custom {
            background-image: url('/fondo_foto/costanera.jpeg') !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: white;
        }
    </style>
</head>
<body>
    <div class="gradient-custom">
        @include('layouts.navbar')
        <div class="container mt-4">
            <h1 class="mb-4">Preguntas Frecuentes</h1>
            <div class="accordion" id="faqAccordion">

                <!-- Pregunta 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            ¿Cómo puedo reservar un puesto para la feria?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Puedes reservar un puesto en nuestra seccion de reservas, completando el formulario de reserva con tus datos, seleccionando la fecha y cantidad de puestos.
                        </div>
                    </div>
                </div>

                <!-- Pregunta 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ¿Cuáles son las fechas y horarios de la próxima feria?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Puedes visualizar la próxima fecha de feria en el calendario.
                        </div>
                    </div>
                </div>

                <!-- Pregunta 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            ¿Qué documentos necesito para reservar un puesto?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Solo necesitarás tu numero de DNI o CUIl.
                        </div>
                    </div>
                </div>

                <!-- Pregunta 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            ¿Cuánto cuesta reservar un puesto en la feria?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            El costo de reserva varía según la cantidad de puestos a reservar.
                        </div>
                    </div>
                </div>

                <!-- Pregunta 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            ¿Existen descuentos para reservar varios días o puestos?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Sí, ofrecemos un descuento del 10% si reservas por los tres días completos de la feria o si reservas más de dos puestos.
                        </div>
                    </div>
                </div>

                <!-- Pregunta 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            ¿Cómo sé qué puestos están disponibles para la reserva?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Al ingresar a la sección de reservas de nuestra página web, verás un mapa interactivo con los puestos disponibles.
                        </div>
                    </div>
                </div>

                <!-- Pregunta 7 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            ¿Qué tipo de productos o servicios puedo ofrecer en la feria?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Puedes ofrecer una amplia variedad de productos, desde artesanías hasta comida y bebida, siempre que cumplan con las regulaciones de la feria.
                        </div>
                    </div>
                </div>

                <!-- Pregunta 8 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            ¿Puedo cambiar la ubicación de mi puesto después de reservar?
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            No se permiten cambios de ubicación una vez que el puesto ha sido reservado y confirmado.
                        </div>
                    </div>
                </div>

                <!-- Pregunta 9 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            ¿Cuál es la política de cancelación de las reservas?
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Puedes cancelar tu reserva hasta 7 días antes del evento con un reembolso completo. Después de esa fecha, no se ofrecen reembolsos.
                        </div>
                    </div>
                </div>

                <!-- Más preguntas -->
                <!-- Continúa agregando las otras preguntas de manera similar -->

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
