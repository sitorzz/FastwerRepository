<?php 

        include "php/session.php";
        include 'php/conexion.php';  

        $id_pregunta = $_GET['id_pregunta']; 


        $queryDelete ="Delete FROM question WHERE fk_user = ".$id_session." and id_question = ".$id_pregunta." ";
        $resultEliminado = mysqli_query($con,$queryDelete);

        if (!$queryDelete) {
            die("Database query failed: " . mysqli_error());
        }

         print "<script>alert(\"Eliminación de pregunta satisfactoriamente!!\");window.location='home.php';</script>";

    ?>


