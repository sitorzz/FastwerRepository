 <?php

include "session.php";
include 'conexion.php';

$identificador = $_GET['idFriend']; 

$result = "DELETE FROM friends where id_friend = ".$identificador."";

$con->query($result);

$con->close();
  
header('Location: ../myFriends.php');

?>