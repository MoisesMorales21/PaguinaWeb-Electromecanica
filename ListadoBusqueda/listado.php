<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="icon" href="./img/imagen.jpeg">
<title>Listado de Ordenes</title>
<style>
table, td, th {
    border: 1px solid black;
}

table{
    width: 80%;
    border-collapse: collapse;
}
.boton-derecha {
  position: fixed; /* Permanece en una posición fija en la ventana */
  bottom: 20px; /* Ajusta la distancia desde abajo */
  right: 20px; /* Ajusta la distancia desde la derecha */
  padding: 10px 20px; /* Espaciado interno del botón */
  background-color: #3498db; /* Color de fondo del botón */
  color: #fff; /* Color del texto del botón */
  border: none; /* Quita el borde del botón */
  border-radius: 5px; /* Agrega esquinas redondeadas */
  cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
}

</style>
</head>
<!-- Botón para regresar a la página principal -->
<button onclick="irAPaginaPrincipal()" class="boton-derecha">CERRAR SESION</button>

<script>
  function irAPaginaPrincipal() {
    // Redireccionar a la página principal
    window.location.href = '../index.html'; // Reemplaza 'index.html' con la URL de tu página principal
  }
</script>

<body>
<a href="busqueda.php" class="boton">Ir a registros de Ordenes de Servicio</a> </br>
<a href="busquedaCliente.php" class="boton">Ir a registros de clientes</a> </br>
<a href="listado.php" class="boton">Ver los servicios mas solicitados</a>
<h2>Listado de servicios mas solicitados</h2>

<table>
    <tr>
        <th>Servicio</th>
        <th>Subservicio</th>
        <th>N° de Solicitudes</th>
</tr>

<?php
            include ("../login_create/cn.php");
            $orden=$mysql->query("SELECT se.descripcion as sedescripcion, 
                    su.descripcion as sudescripcion, COUNT(deo.idsubservicio) as 'Solicitudes' from subservicio su
                    INNER JOIN detalleorden deo ON su.idsubservicio=deo.idsubservicio
                    INNER JOIN servicio se ON su.idservicio=se.idservicio
                    GROUP BY su.descripcion ORDER BY se.descripcion, Solicitudes DESC;
            ");

            foreach($orden as $or)
            {
                echo "<tr>
                    <td>{$or['sedescripcion']}</td>
                    <td>{$or['sudescripcion']}</td>
                    <td>{$or['Solicitudes']}</td>";
            }
        ?>

</body>
</html>