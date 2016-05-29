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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">
    <link href="css/friends.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!--    En este apartado puedes ver tus amigos (ya agregados) o buscar usuarios para agregarlos -->

<body>

    <?php
    
        include "nav.php";
    
    ?>

    <!-- Page Content -->
    <div class="container">

                <!-- Texto informativo -->
        <div class="row">
            <div class="col-xs-12">
                <img class="img-responsive img-rounded" src="images/myFriends.png"  id="titleF" alt="">
            </div>

            <div class="col-xs-12">
                <div class="well text-center">
                    BUSQUEDA PREGUNTA
                </div>
            </div>            
        </div>
        
            
        
        <!-- Buscar amigos -->
        
        <form method="post" role="form" name="registro" action="searchQuestion.php">

            <div class="form-group">
            <label for="nameFriend" class="soporte">Buscar pregunta (por título): </label>
            <input class="form-control" type="text" name="nameQuestion" placeholder="Titulo de la pregunta" required>
            </div>

            <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Buscar" class="btn btn-default">
            
        </form>
 
        <hr>
        
        
    
    
        <!-- Amigos PHP -->
            
         <?php

        include 'php/conexion.php';
        //select el cual recoges todos los amigos que el usuario (idsesion) tiene.
        $result = mysqli_query($con,"select q.id_question,q.title, q.question,q.views,q.date_create, q.fk_user FROM friends f, user u, question q WHERE q.fk_user='".$id_session."' GROUP BY q.id_question ORDER BY date_create DESC LIMIT 5");

         if (!$result) {
         die("Database query failed: " . mysqli_error());
         }
              //para cada row (amigo) encontrado se imprime el div con los datos    
         while ($row = mysqli_fetch_array($result)) {
             
                echo '<div class="row rowFriend">
                        <div class="col-xs-12" >
                            <h class="nameFriend" >'.$row[1].'</h>
                            <a class="btn btn-primary btn-lg addFriend" href="visualizeQuestion.php?id_pregunta='.$row[0].'">Responder pregunta</a>
                        </div>
                        </div>';

          
         
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
