
<?php

include "session.php";
include 'conexion.php';
    
$valor = $_POST['respuesta']; 

$resultados = explode(";", $valor);

$responder = "insert into user_answer values (".$resultados[0].",".$id_session.",NOW())";

$con->query($responder);



//header ("Location: ../visualizeQuestion.php"); 

header ("Location: ../visualizeQuestion.php?id_pregunta=$resultados[1]"); 

//header ("Location: ../home.php"); 


//echo '<meta http-equiv="refresh" content="1;URL=../visualizeQuestion.php" /> ';
//header ("Location: ../visualizeQuestion.php"); 


?> 