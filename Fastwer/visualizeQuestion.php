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
    <link href="css/answerQuestion.css" rel="stylesheet">

</head>

<!-- Este apartado se utiliza para responder una pregunta (primero se detecta que pregunta ha sido la seleccionada y se visualiza esta 
    únicamente en otra pantalla y te da la opción de responderla o si ya esta respondida de modificar la respuesta-->

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
                VISUALIZAR Y RESPONDER PREGUNTA
            </div>
        </div>            
    </div>



    <!-- Informacion de la pregunta -->   

    <?php

        include 'php/conexion.php';  

        $id_pregunta = $_GET['id_pregunta']; 
        $respondido = false;
        $pregunta_respondida = 0;
        $checked = true;



        $queryRespondido ="select a.* from answer a, user_answer u where a.pk_answer = u.pk_fk_answer and u.pk_fk_id_user = ".$id_session." and a.fk_question = ".$id_pregunta." ";
        $resultRespondido = mysqli_query($con,$queryRespondido);

        if (!$queryRespondido) {
            die("Database query failed: " . mysqli_error());
        }

        while ($row3 = mysqli_fetch_array($resultRespondido)) {

            $respondido = true;
            $pregunta_respondida = $row3[0];
        }

        
         
     

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
            
            if($pregunta_respondida == $row[0]){
                  echo '<div class="row rowRespondida">
                    <input class="respondido" type="radio" value="'.$row[0].';'.$row[1].'" name="respuesta" CHECKED>'.$row[2].' - '.$numVotos.'                                 votos</input>                    
                  </div> ';   
               $checked = false;

            } else{
                
                
                if($checked == true){
                    echo '<div class="row rowFriend">
                    <input class="respondido" type="radio" value="'.$row[0].';'.$row[1].'" name="respuesta" CHECKED>'.$row[2].' - '.$numVotos.'                                 votos</input>                    
                    </div> ';  
                    $checked = false;
                } else {
                    echo '<div class="row rowFriend">
                    <input class="respondido" type="radio" value="'.$row[0].';'.$row[1].'" name="respuesta">'.$row[2].' - '.$numVotos.'                                 votos</input>                    
                    </div> ';  
                }
                
              
            }
            


        }

        if($respondido == false){
                    echo '    <input type="submit" name="submit" id="submit" value="Responder"/> <br/>
                  </form>
              </div>';
        } else {
                    echo '    <input type="submit" name="modificar" id="submit" value="Modificar respuesta"/> <br/>
                  </form>
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
