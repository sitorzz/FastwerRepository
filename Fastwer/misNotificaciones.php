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
    <link href="css/misNotificaciones.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- En este apartado podras visualizar tus preguntas echas (a la derecha) o podras ver las preguntas echas por tus amigos (izquierda)-->

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
        //select de todas las preguntas de los amigos de la idSesion actual 
        $result1 = mysqli_query($con,"select q.id_question,q.title, q.question,q.views,q.date_create, q.fk_user FROM friends f, user u, question q WHERE q.fk_user in (SELECT u.id FROM friends f, user u WHERE u.id = f.id_friend AND f.id_user='".$id_session."' ORDER BY u.username) GROUP BY q.id_question ORDER BY date_create DESC LIMIT 10");

         if (!$result1) {
         die("Database query failed: " . mysqli_error());
         }

               echo'    <div class="col-xs-12 col-md-6" id="questionDi">';
         while ($row = mysqli_fetch_array($result1)) {

                    $resultSelc = mysqli_query($con,"select username FROM  user  WHERE  id=" .$row['fk_user'] . "");
                    while ($row2 = mysqli_fetch_array($resultSelc)) {                  

                 echo'
                    


                   
                    <i><u><h4>(Pregunta hecha por tu amigo/amiga: '.$row2['username'].')</h4></u></i>
                    <h2>'. $row['title'] .'</h2>

                    <a class="btn btn-default" href="visualizeQuestion.php?id_pregunta='.$row[0].'">Responder pregunta...</a></p>
                    
                    
                    ';
                }
                                                    
                }
               echo '</div>';   

                ?>
                <?php
                //select de las preguntas echas por el propio usuario
                $result = mysqli_query($con,"select q.id_question,q.title, q.question,q.views,q.date_create, q.fk_user FROM friends f, user u, question q WHERE q.fk_user='".$id_session."' GROUP BY q.id_question ORDER BY date_create DESC LIMIT 10");

               echo'    <div class="col-xs-12 col-md-6" id="questionDi">';
               echo '   <i><u><h4>(Preguntas hechas por ti)</h4></u></i>';
        
     		    while ($row = mysqli_fetch_array($result)) {

                    $resultSelc = mysqli_query($con,"select username FROM  user  WHERE  id=" .$row['fk_user'] . "");
                    while ($row2 = mysqli_fetch_array($resultSelc)) {                  

                 echo'
                    
                    <h2>'. $row['title'] .'</h2>

                    <a class="btn btn-default" href="visualizeQuestion.php?id_pregunta='.$row[0].'">Responder pregunta...</a></p>
                    <a class="btn btn-default" href="eliminarQuestion.php?id_pregunta='.$row[0].'">Eliminar pregunta...</a></p>
                    <a class="btn btn-default" href="update_question.php?id_pregunta='.$row[0].'">Update pregunta...</a></p>
                    
                    ';
                }
                                                    
                }
               echo '</div>'; 
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