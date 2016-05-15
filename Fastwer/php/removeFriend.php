 <?php

include "session.php";
include 'conexion.php';

//recoges el $GET (la id del friend a eliminar)
$identificador = $_GET['idFriend']; 
//haces un delet en la bbdd de la id del Friend que te han pasado
$result = "DELETE FROM friends where id_friend = ".$identificador."";

$con->query($result);

$con->close();
//te redirecciona a la página de myFriends
print "<script>window.location='../myFriends.php';</script>";

?>