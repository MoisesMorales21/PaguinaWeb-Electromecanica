<?php
include("../login_create/cn.php");
date_default_timezone_set('America/Lima');
$fecha_actual = date('Y-m-d H:i:s');
$check1=$_REQUEST['check1'];
$check2=$_REQUEST['check2'];
$check3=$_REQUEST['check3'];
$check4=$_REQUEST['check4'];
$check5=$_REQUEST['check5'];
$check6=$_REQUEST['check6'];
$check7=$_REQUEST['check7'];
$check8=$_REQUEST['check8'];
$check9=$_REQUEST['check9'];
$check10=$_REQUEST['check10'];
$check11=$_REQUEST['check11'];
$check12=$_REQUEST['check12'];
$check13=$_REQUEST['check13'];
$check14=$_REQUEST['check14'];
$check15=$_REQUEST['check15'];
$check16=$_REQUEST['check16'];
$check17=$_REQUEST['check17'];
$check18=$_REQUEST['check18'];
$idusuario=$_REQUEST['idusuario'];
$direccion=$_REQUEST['direccion'];

//Metodo para validar checks
function checkInsert($idorden,$idsub,$cn) {
    if (intval($idsub) >= 1) {
        $j=mysqli_query($cn, "INSERT INTO DetalleOrden (idorden,idsubservicio) VALUES ('".$idorden."','".$idsub."')");
    }
}

// Hacer la siguiente acción
        /*Query para insertar los datos en la tabla Orden*/
        $sqlInsertOrden="INSERT INTO Orden (idusuario,direccion,fecha)";
        $sqlInsertOrden.=" VALUES ('".$idusuario."','".$direccion."','".$fecha_actual."')";
        /*Se inserta los datos en tabla Orden*/
        $i=mysqli_query($mysql,$sqlInsertOrden);
        sleep(1);
        /*Se busca el idorden del usuario que acaba de ingresar solicitud para ponerlo en el fk de DetalleOrden*/
        $sql2 = "SELECT idorden FROM Orden WHERE idusuario = '$idusuario' ORDER BY idorden DESC LIMIT 1";
        $result = mysqli_query($mysql, $sql2);
        $row = mysqli_fetch_assoc($result);
        /*$orden ya sabe el id*/
        $idorden = $row['idorden'];
        /*$idorden se pone en el atributo idorden de la tabla DetalleOrden*/
        checkInsert($idorden, $check1, $mysql);
        checkInsert($idorden, $check2, $mysql);
        checkInsert($idorden, $check3, $mysql);
        checkInsert($idorden, $check4, $mysql);
        checkInsert($idorden, $check5, $mysql);
        checkInsert($idorden, $check6, $mysql);
        checkInsert($idorden, $check7, $mysql);
        checkInsert($idorden, $check8, $mysql);
        checkInsert($idorden, $check9, $mysql);
        checkInsert($idorden, $check10, $mysql);
        checkInsert($idorden, $check11, $mysql);
        checkInsert($idorden, $check12, $mysql);
        checkInsert($idorden, $check13, $mysql);
        checkInsert($idorden, $check14, $mysql);
        checkInsert($idorden, $check15, $mysql);
        checkInsert($idorden, $check16, $mysql);
        checkInsert($idorden, $check17, $mysql);
        checkInsert($idorden, $check18, $mysql);

        /*¿A donde mandamos al usuario?*/
        header("location: ../Factura/FacturaC.php");    
        /*header("Location: ../index.html"); // Redirige a la pantalla principal*/

?>