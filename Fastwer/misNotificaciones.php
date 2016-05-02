<?php 

include "php/session.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FASTWER</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">
    <link href="css/misNotificaciones.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php
    
        include "nav.php";
    
    ?>

    <!-- Page Content -->
    <div class="container">


        <!-- Texto informativo -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    <b>Mis notificaciones:</b> Últimas preguntas de tus amigos/amigas
                </div>
            </div>            
        </div>   
        
        
        
        
        
            
    	
        <!-- Buscar Amigos PHP -->
            
       <?php

        
            
     
        include 'php/conexion.php';

        $result = mysqli_query($con,"select q.id_question,q.title, q.question,q.views,q.date_create, q.fk_user FROM friends f, user u, question q WHERE u.id = f.id_friend AND f.id_user='".$id_session."' GROUP BY q.id_question ORDER BY date_create DESC LIMIT 20");
       

         if (!$result) {
         die("Database query failed: " . mysqli_error());
         }
                  
         while ($row = mysqli_fetch_array($result)) {

                    $resultSelc = mysqli_query($con,"select username FROM  user  WHERE  id=" .$row['fk_user'] . "");
                    while ($row2 = mysqli_fetch_array($resultSelc)) {                  

                 echo'
                    


                    <div class="col-xs-6" id="questionDi">
                    <p><i>(Pregunta echa por tu amigo/amiga: '.$row2['username'].')</i></p>
                    <h2>'. $row['title'] .'</h2>

                    <a class="btn btn-default" href="visualizeQuestion.php?id_pregunta='.$row[0].'">Responder pregunta...</a></p>
                    
                    </div> 
                    ';
                }
                                                    
                }
                  
      ?>       
        
     
        


        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; ProyectoM013 - FASTWER</p>
                </div>
            </div>
        </footer>

        
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>