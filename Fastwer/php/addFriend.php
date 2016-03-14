<?php

include "session.php";
include 'conexion.php';

$identificador = $_GET['name']; 

$result = "INSERT into friends VALUES (".$id_session.",".$identificador.")";

$con->query($result);

$con->close;
    
header('Location: ../myFriends.php');



?>