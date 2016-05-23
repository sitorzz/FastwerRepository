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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    
    <!-- Este php se utiliza para visualizar las preguntas (20) (por fecha o por defecto)-->

<body>

    <?php
    
        include "nav.php";
    
    ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="images/home.jpg" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Visualizar</h1>
                <p>¿Tienes muchas preguntas y nadie de tu alrededor sabe la respuesta? </p>
                <p>Fastwer es tu solución! Haz click en Alta Pregunta y sube todas las dudas que tengas. </p>
                <p>Puedes optar por dos tipos de respuesta, la rápida es de (si o no) o la larga es que tu decides tres posibles respuestas.</p>
                <a class="btn btn-primary btn-lg" href="add_question.php">Alta pregunta!</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    <form action="home.php" method="post">
                    <select name="option">      
                         <option name=option default value="Per defecte">Por defecto</option>                    
                         <option name=option value="Temps">Tiempo</option>
                    </select>
                    <button>Ordenar</button>
                    </form>

                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
        <?php

            include "php/conexion.php";

            if(isset($_POST['option'])){
            //si seleccionan la opcion por defecto se hace un select normal                                
            if($_POST['option']=='Per defecte'){

                $consulta_mysql="select id_question,title, question,views,date_create from question LIMIT 20";

            }
            //si seleccionan la opcion por tiempo se hace un order by por el campo de fecha de creación 
            else if($_POST['option']=='Temps'){

                $consulta_mysql="select id_question,title, question,views,date_create from question ORDER BY date_create DESC LIMIT 20";

            }
           
            }else{
                //si no eligen ningun de las opciones esta la de "por defecto"
                $consulta_mysql="select id_question,title, question,views,date_create from question LIMIT 20";
            }


                $resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);
        
                
                //recorre el select hasta que no hayan resultados y imprime para cada uno un div con sus datos.
                while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {

                 echo'
             

                    <div class="col-xs-12 col-md-4 divCentro">
                    <h2>'. $row['title'] .'</h2>
                    
                    <p>Fecha creación : '.$row['date_create'].'</p>
                    
                    <p><a class="btn btn-default" href="visualizeQuestion.php?id_pregunta='.$row[0].'">Ver o Responder pregunta...</a></p>
                    
                    </div> 
                    ';
                                        
                    //$_SESSION["pregunta"] = $row[0];
                    //<a class="btn btn-default" href="visualizeQuestion.php?id_pregunta='.$row[0].'">Responder pregunta...</a></p>
                    //<a class="btn btn-default" name="visualizar" href="">Responder pregunta...</a></p>
                    //<a class="btn btn-default" href="visualizeQuestion.php">Responder pregunta...</a></p>
                    

                    
                }
            
                //cierras la conexión
                $con->close();
         ?>
        </div>


        <!-- /.row -->

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



