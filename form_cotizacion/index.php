<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Formulario de Cotización</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            background-image: url('http://minatitlan.tecnm.mx/wp-content/uploads/2022/11/141.jpeg'); 
            background-size: cover;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            width: 80%;
        }

        form {
            width: 80%;
            margin-bottom: 20px;
        }

        table {
            width: 100%; 
            margin-top: 20px; 
            border-collapse: collapse; 
        }

        th, td {
            border: 2px solid #000; 
            padding: 20px;
            text-align: center; 
        }

        .checkbox-container {
            background-color: #c0c0c0; 
            border: 4px solid #999;
            border-radius: 5px;
            padding: 5px; 
            margin-bottom: 5px;
            width: 100%;
        }

        .cotizacion-title {
            color: #3946f7;
            font-size: 24px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .servicio-label {
            color: #0091d4;
            background-color: white; 
            display: block; 
            padding: 10px; 
            border-radius: 5px; 
            margin-bottom: 10px; 
            text-align: left; 
        }

        .subservicio-label {
            color: #000;
            background-color: white; 
            display: block; 
            padding: 10px; 
            border-radius: 5px; 
            margin-bottom: 10px; 
            text-align: left; 
        }
    </style>
</head>
<body>
    <div class="container">

    <?php
    // Verifica si se envió el formulario con el método POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        echo "</table>";

        // Muestra la ubicación ingresada por el usuario debajo de la tabla
        $ubicacion = isset($_POST["ubicacion"]) ? htmlspecialchars($_POST["ubicacion"]) : "";
        echo "<p>Ubicación: $ubicacion</p>";

        // Obtén el id_usuario de la URL si está presente
        $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        // Por ejemplo, para mostrarlo en algún lugar de la página:
        echo "<p>ID de Usuario: $id_usuario</p>";
    }
?>
        <form action="agregar.php" method="post">
            <div class="cotizacion-title">Cotización</div>
            <div class="checkbox-container">
            <label class="servicio-label" style="margin-top: 20px;">
            <!--ID Usuario-->
            <br>
            <input type="hidden" name="idusuario" value="<?php session_start(); ECHO $_SESSION['id_usuario']; ?>">
            <div class="checkbox-container">
            <label class="servicio-label" style="margin-top: 20px;">
    Ubicación:
    <br>
    <input type="text" name="direccion" id="direccion" placeholder="Ingrese la ubicación">
</label>
            
                <label class="servicio-label">
                    <input type="checkbox" name="servicios[electricidad_industrial]" value="1" onclick="showSubservices('electricidad_industrial')"> Electricidad Industrial
                </label>
                <br>
                <div id="electricidad_industrial-subservices" style="display:none;">
                    <label class="subservicio-label">
                        <input type="checkbox" id="check1" name="check1" value=1> Instalación Eléctrica para la Industria y Edificaciones
                    </label>
                    <br>
                </div>
                
            <label class="servicio-label">
                    <input type="checkbox" name="servicios[electromecanica]" value="1" onclick="showSubservices('electromecanica')"> Electromecánica
                </label>
                <br>
                <div id="electromecanica-subservices" style="display:none;">
                <label class="subservicio-label">
                    <input type="checkbox" id="check2" name="check2" value=2> Instalación Sistema de Agua contra Incendio
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check3" name="check3" value=3> Instalación Sistema de Agua Potable
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check4" name="check4" value=4> Instalación Sistema de Agua para Piscinas
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check5" name="check5" value=5> Sistemas de Refrigeración y Aire Acondicionado
                </label>
                <br>
            </div>

            <label class="servicio-label">
                    <input type="checkbox" name="servicios[estructuras_metalicas]" value="1" onclick="showSubservices('estructuras_metalicas')"> Estructuras Metálicas
                </label class="subservicio-label">
                <br>
                <div id="estructuras_metalicas-subservices" style="display:none;">

                <label class="subservicio-label">
                    <input type="checkbox" id="check6" name="check6" value=6> Carpintería Metalica
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check7" name="check7" value=7> Trabajo en Acero
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check8" name="check8" value=8> Fabricación de Puertas Enrollables y Contra Placadas
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check9" name="check9" value=9> Instalación de Techos
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check10" name="check10" value=10> Pintado de Estructuras
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check11" name="check11" value=11> Mantenimiento General
                </label>
                <br>
            </div>

            <label class="servicio-label">
                    <input type="checkbox" name="servicios[energias_menores]" value="1" onclick="showSubservices('energias_menores')"> Energías Menores
                </label>
            <br>
                <div id="energias_menores-subservices" style="display:none;">
                <label class="subservicio-label">
                    <input type="checkbox" id="check12" name="check12" value=12> Cableado Estructurado
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check13" name="check13" value=13> Alarmas
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check14" name="check14" value=14> Video Vigilancia
                </label>
                <br>
            </div>

            <label class="servicio-label">
                    <input type="checkbox" name="servicios[acabados_construccion]" value="1" onclick="showSubservices('acabados_construccion')"> Acabados en la Construcción
                </label>
                <br>
                <div id="acabados_construccion-subservices" style="display:none;">
                <label class="subservicio-label">
                    <input type="checkbox" id="check15" name="check15" value=15> Sistema de Drywall
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check16" name="check16" value=16> Pintura de Paredes, Maderas y Estructuras
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check17" name="check17" value=17> Carpintería en Madera y Melamina
                </label>
                <br>
                <label class="subservicio-label">
                    <input type="checkbox" id="check18" name="check18" value=18> Pisos Cerámicos y Porcelanatos
                </label>
                <br>
            </div>

            <input type="submit" value="Enviar">
        </form>
    </div>


<script>
        function showSubservices(service) {
            var subservicesDiv = document.getElementById(service + "-subservices");
            var checkbox = document.querySelector('input[name="servicios[' + service + ']"]');

            if (checkbox.checked) {
                subservicesDiv.style.display = "block";
            } else {
                subservicesDiv.style.display = "none";
            }

            actualizarTablaServicios(); // Actualiza la tabla de servicios y subservicios
        }

        function actualizarTablaServicios() {
            var servicios = document.querySelectorAll('input[name^="servicios"]:checked');
            var tablaServicios = document.getElementById('tablaServicios');
            var tbody = tablaServicios.getElementsByTagName('tbody')[0];
            tbody.innerHTML = ''; // Limpia la tabla para actualizarla

            servicios.forEach(function(servicio) {
                var servicioNombre = servicio.parentNode.textContent.trim();
                var subserviciosAsociados = document.querySelectorAll('#' + servicio.value + '-subservices input[type="checkbox"]:checked');

                if (subserviciosAsociados.length > 0) {
                    var row = tbody.insertRow();
                    var cellServicio = row.insertCell(0);
                    var cellSubservicios = row.insertCell(1);

                    cellServicio.innerHTML = servicioNombre;

                    var subserviciosNombres = [];

                    subserviciosAsociados.forEach(function(subservicio) {
                        subserviciosNombres.push(subservicio.parentNode.textContent.trim());
                    });

                    cellSubservicios.innerHTML = subserviciosNombres.join(', ');
                }
            });
        }

        // Llamar a la función cuando se cargue la página para mostrar los seleccionados iniciales si los hay
        window.onload = function() {
            actualizarTablaServicios();
        };

        // Añadir eventos onchange a todos los checkboxes de servicios para mostrar los subservicios y actualizar la tabla en tiempo real
        var servicioCheckboxes = document.querySelectorAll('input[type="checkbox"]');
        servicioCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var service = this.name.replace('servicios[', '').replace(']', '');
                showSubservices(service);
            });
        });
    </script>
</body>
</html>