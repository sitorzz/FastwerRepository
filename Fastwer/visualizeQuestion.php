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
    <link href="css/friends.css" rel="stylesheet">    
    <link href="css/answerQuestion.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="http://placehold.it/150x50&text=Logo" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="home.php">Visualizar</a>
                    </li>
                    <li>
                        <a href="add_question.php">Nueva Pregunta</a>
                    </li>
                    <li>
                        <a href="myFriends.php">Amigos</a>
                    </li>
                    <li>
                        <a href="#">Soporte</a>
                    </li>
                    <li>
                        <a href="#">Mi perfil</a>
                    </li>
                    
                    <li>
                        <a href="php/logout.php">Cerrar sesión</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

            <!-- Texto informativo -->
    <div class="row">
        <div class="col-lg-12">
            <div class="well text-center">
                VISUALIZAR Y RESPONDER PREGUNTA
            </div>
        </div>            
    </div>



    <!-- Informacion de la pregunta -->   

    <?php

        include 'php/conexion.php';
            
        $id_pregunta = $_GET['id_pregunta'];

        $resultQuestion = mysqli_query($con,"select * from question WHERE id_question = ".$id_pregunta."");

        if (!$resultQuestion) {
            die("Database query failed: " . mysqli_error());
        }

        while ($row = mysqli_fetch_array($resultQuestion)) {

             echo '<div class="row">
                         <img class="imageQuestion" src="'.$row[4].'">
                         <h1>'.$row[1].'</h1>
                         <h4>'.$row[2].'</h4>
                   </div>  ';
        }

        
        

        $resultAnswers = mysqli_query($con,"select a.* from answer a, question q WHERE q.id_question = a.fk_question and q.id_question=".$id_pregunta."");
        if (!$resultAnswers) {
            die("Database query failed: " . mysqli_error());
        }

        echo '<div class="row">
                  <form action="php/answerQuestion.php" method="post">';        

        while ($row = mysqli_fetch_array($resultAnswers)) {
            
            
            $numVotos = 0;
            
            $resultRespuestas = mysqli_query($con,"select COUNT(u.pk_fk_id_user) from user_answer u, answer a where u.pk_fk_answer = a.pk_answer and a.fk_question = ".$id_pregunta." and a.pk_answer = ".$row[0]."");
            while ($row2 = mysqli_fetch_array($resultRespuestas)) {

                //echo $row2[0];
                $numVotos = $row2[0];
                
            }
            
            
            echo '<div class="row rowFriend">
                    <input type="radio" value="'.$row[0].'" name="respuesta">'.$row[2].' - '.$numVotos.' votos</input>                    
                  </div> ';

        }

        echo '    <input type="submit" name="submit" id="submit" value="Responder"/> <br/>
                  </form>
              </div>';

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
