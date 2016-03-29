
<?php

include "session.php";
include 'conexion.php';
    
$valor = $_POST['respuesta']; 
echo $valor; 


$responder = "insert into user_answer values (".$valor.",".$id_session.",NOW())";

$con->query($responder);


//header ("Location: ../visualizeQuestion.php"); 
header ("Location: ../home.php"); 


//echo '<meta http-equiv="refresh" content="1;URL=../visualizeQuestion.php" /> ';
//header ("Location: ../visualizeQuestion.php"); 


?> 