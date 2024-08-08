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
<h2>Listado de Solicitudes de ordenes de Servicio</h2>

<table>
    <tr>
        <th>Id.Orden</th>
        <th>Fecha</th>
        <th>Cliente</th>
        <th>DNI</th>
        <th>Detalle del cliente</th>
        <th>Detalle de Orden</th>
        <th>Estado de la orden</th>
</tr>

<?php
            include ("../login_create/cn.php");
            $orden=$mysql->query("Select o.idorden,o.fecha, p.idpersona, p.nombre, p.apellido,
            p.dni, o.estado from orden o 
            INNER JOIN usuario u ON o.idusuario=u.idusuario 
            INNER JOIN persona p ON u.idpersona=p.idpersona
            ORDER BY o.fecha DESC
            ");

            foreach($orden as $or)
            {
                echo "<tr>
                    <td>{$or['idorden']}</td>
                    <td>{$or['fecha']}</td>
                    <td>{$or['apellido']}, {$or['nombre']}</td>
                    <td>{$or['dni']}</td>";   
                echo "<td><a href='detalleCliente.php?idpersona={$or['idpersona']}'>Ver Cliente</a></td>";
                echo "<td><a href='../Factura/Factura.php?idorden={$or['idorden']}'>Ver Orden</a></td>";
                echo "<td>{$or['estado']}</td>";
                echo "</tr>";
            }
        ?>

</body>
</html>