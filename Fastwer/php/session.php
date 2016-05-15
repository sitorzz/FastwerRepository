<?php
//abres la session y das valor a la variable $id_session y $id_pregunta
@session_start();

$id_session=$_SESSION["id"];

@$id_pregunta = $_SESSION["pregunta"];


?>