<?php 

include "conexion.php";

$idActivar = $_GET['idActivar']; 

$result = "UPDATE user SET activado = 1 where id = '".$idActivar."'";

$con->query($result);

echo 'Activar cuenta funciona : '.$idActivar;

?>