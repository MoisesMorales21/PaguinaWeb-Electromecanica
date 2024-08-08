<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="icon" href="./img/imagen.jpeg">
<title>Listado de Clientes</title>
<style>
table, td, th {
    border: 1px solid black;
}

table{
    width: 80%;
    border-collapse: collapse;
}
</style>
</head>

<body>
<a href="busqueda.php" class="boton">Ir a registros de Ordenes de Servicio</a> </br>
<a href="busquedaCliente.php" class="boton">Ir a registros de clientes</a> </br>
<a href="listado.php" class="boton">Ver los servicios mas solicitados</a>
<h2>Clientes Registrados</h2>

<table>
    <tr>
        <th>Nombre del Cliente</th>
        <th>DNI</th>
        <th>Celular</th>
        <th>Correo</th>
        <th>Direccion</th>
        <th>Serv. Solicitados</th>
        <th>Serv. Aceptados</th>
</tr>

<?php
            include ("../login_create/cn.php");
            $cliente=$mysql->query("SELECT p.nombre, p.apellido, p.dni, p.celular, u.correo, p.direccion,
                                    COUNT(*) as 'Sevicios_Solicitados',
                                    COUNT(CASE WHEN o.estado = 2 THEN 1 END) as 'Sevicios_Aceptados'
                                    FROM detalleorden d
                                    INNER JOIN orden o ON d.idorden=o.idorden
                                    INNER JOIN usuario u ON o.idusuario=u.idusuario
                                    INNER JOIN persona p ON u.idpersona=p.idpersona
                                    GROUP BY u.idusuario ORDER BY p.apellido;
            ");
            

            foreach($cliente as $cl)
            {
                echo "<tr>
                    <td>{$cl['apellido']}, {$cl['nombre']}</td>
                    <td>{$cl['dni']}</td>
                    <td>{$cl['celular']}</td>
                    <td>{$cl['correo']}</td>
                    <td>{$cl['direccion']}</td>
                    <td>{$cl['Sevicios_Solicitados']}</td>
                    <td>{$cl['Sevicios_Aceptados']}</td>";
                echo "</tr>";
            }
        ?>
        
</body>
</html>