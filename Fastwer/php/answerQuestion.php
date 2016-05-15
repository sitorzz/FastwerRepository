
<?php

include "session.php";
include 'conexion.php';
    
$valor = $_POST['respuesta']; 
// en el post le pasamos la id respuesta y la id de la pregunta separado por ; (con el explode lo separamos)
$resultados = explode(";", $valor);

$id_respuesta = $resultados[0]; //id de la respuesta
$id_pregunta = $resultados[1]; //id de la pregunta

// si pulsan el boton de responder
if(isset($_POST['submit']))
{ 

    //insert en la tabla respuesta
    $responder = "insert into user_answer values (".$id_respuesta.",".$id_session.",NOW())";

    $con->query($responder);


    //header ("Location: ../visualizeQuestion.php?id_pregunta=$id_pregunta"); 
    print "<script>window.location='../visualizeQuestion.php?id_pregunta=$id_pregunta';</script>";
    
    //si pulsan el boton de modificar
} else if(isset($_POST['modificar'])) {
    
    //se elimina la respuesta anterior y se hace el nuevo insert
    $responder = "delete from user_answer where pk_fk_id_user = ".$id_session." and pk_fk_answer in (select pk_answer from answer where fk_question = ".$id_pregunta.")";
    $con->query($responder);
    
    
    $responder = "insert into user_answer values (".$id_respuesta.",".$id_session.",NOW())";

    $con->query($responder);
                    
    //header ("Location: ../visualizeQuestion.php?id_pregunta=$id_pregunta"); 
    print "<script>window.location='../visualizeQuestion.php?id_pregunta=$id_pregunta';</script>";

    
}

?> 



