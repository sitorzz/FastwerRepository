<?php

include "session.php";
include 'conexion.php';

$identificador = $_GET['name']; 

//recoges el identificador que se lo pasas por el $GET y haces el insert del amigo

$result = "INSERT into friends VALUES (".$id_session.",".$identificador.")";

$con->query($result);

$con->close();

//luego vuelve a la pantalla myFriends con el siguiente script
    
print "<script>window.location='../myFriends.php';</script>";


?>