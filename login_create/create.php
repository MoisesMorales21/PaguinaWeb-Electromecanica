<?php
    include ("cn.php");
   $nom=$_REQUEST['nombre'];
    $ape=$_REQUEST['apellido'];
    $celular=$_REQUEST['celular'];
    $direccion=$_REQUEST['direccion'];
    $dni=$_REQUEST['dni'];
    $correo=$_REQUEST['correo'];
    $password=$_REQUEST['password'];
    /*Verificamos que antes no exista un correo usado*/
    $sql = "SELECT correo FROM Usuario WHERE correo = '$correo' ORDER BY idpersona DESC LIMIT 1";
    $result = $mysql->query($sql);
    if ($result->num_rows > 0) {
        echo "El correo ingresado ya está registrado, por favor, utilice otro correo o inicie sesion ";

        } else {
            // Hacer la siguiente acción
        /*Query para insertar los datos en la tabla Persona*/
        $sqlInsertPersona="INSERT INTO Persona (nombre,apellido,celular,direccion,dni)";
        $sqlInsertPersona.=" VALUES ('".$nom."','".$ape."','".$celular."','".$direccion."','".$dni."')";
        /*Se inserta los datos en tabla Persona*/
        $i=mysqli_query($mysql,$sqlInsertPersona);
        sleep(3);
        /*Se busca el idpersona de la persona que se acaba de ingresar para ponerlo en el fk de Usuario*/
        $sql2 = "SELECT idpersona FROM Persona WHERE nombre = '$nom' AND apellido = '$ape' ORDER BY idpersona DESC LIMIT 1";
        $result = mysqli_query($mysql, $sql2);
        $row = mysqli_fetch_assoc($result);
        /*$id_persona ya sabe el id*/
        $id_persona = $row['idpersona'];
        /*$id_persona se pone en el atributo idpersona de la tabla Usuario*/
        $sqlInsertUsuario = "INSERT INTO Usuario (idpersona,idrango, correo, password) VALUES ('".$id_persona."',1,'".$correo."','".$password."')";
        /*Se inserta los datos en tabla Usuario*/
        $j=mysqli_query($mysql, $sqlInsertUsuario);
        /*¿A donde mandamos al usuario?*/
        header("location: indexSesion.html");    
        }
    $mysql->close();
?>