<?php
    include ("cn.php");
    $correo=$_POST['co'];
    $password=$_POST['ps'];

    // Crear la consulta SQL
    $sql = "SELECT idusuario, idrango FROM Usuario WHERE correo = '$correo' AND password = '$password' ORDER BY idpersona DESC LIMIT 1";

    // Ejecutar la consulta SQL
    $result = $mysql->query($sql);

    // Verificar si el correo y la contrase�a son correctos
    if ($result->num_rows > 0) {
        // Averiguar el id de usuario y rango
        $result = mysqli_query($mysql, $sql);
        $row = mysqli_fetch_assoc($result);
        /*$id_usuario ya sabe el id*/
        $id_usuario = $row['idusuario'];
        $id_rango = $row['idrango'];
        if ($id_rango == 1) {
            //Enviar a cotizacion
            session_start(); // Iniciar la sesi�n
            $_SESSION['id_usuario'] = $id_usuario; // Almacenar el valor en la variable de sesi�n
            header("Location: ../form_cotizacion/index.php");
            } else {
            //Enviar a datos de la bd
            header("Location: ../ListadoBusqueda/busqueda.php");
            }
        
    } else {
        // Mostrar un mensaje de error, como por ejemplo "Correo o contrase�a incorrectos"
        echo "Correo o contrase�a incorrectos";
    }

    // Cerrar la conexi�n
    $mysql->close();

?>