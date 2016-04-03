
<?php

include "session.php";
include 'conexion.php';
    
$valor = $_POST['respuesta']; 

$resultados = explode(";", $valor);

$responder = "insert into user_answer values (".$resultados[0].",".$id_session.",NOW())";

$con->query($responder);

//header ("Location: ../visualizeQuestion.php?id_pregunta=$resultados[1]"); 

echo '<script language="javascript">alert("Pregunta respondida correctamentes");</script>'; 

print "<script>window.location='../visualizeQuestion.php?id_pregunta=$resultados[1]';</script>";


?> 


