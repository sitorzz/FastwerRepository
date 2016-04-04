
<?php

include "session.php";
include 'conexion.php';
    
$valor = $_POST['respuesta']; 

$resultados = explode(";", $valor);

$id_respuesta = $resultados[0]; //id de la respuesta
$id_pregunta = $resultados[1]; //id de la pregunta


if(isset($_POST['submit']))
{ 


    $responder = "insert into user_answer values (".$id_respuesta.",".$id_session.",NOW())";

    $con->query($responder);


    header ("Location: ../visualizeQuestion.php?id_pregunta=$id_pregunta"); 
    
} else if(isset($_POST['modificar'])) {
    
    
    $responder = "delete from user_answer where pk_fk_id_user = ".$id_session." and pk_fk_answer in (select pk_answer from answer where fk_question = ".$id_pregunta.")";
    $con->query($responder);
    
    
    $responder = "insert into user_answer values (".$id_respuesta.",".$id_session.",NOW())";

    $con->query($responder);
                    
    header ("Location: ../visualizeQuestion.php?id_pregunta=$id_pregunta"); 

    
}

?> 



