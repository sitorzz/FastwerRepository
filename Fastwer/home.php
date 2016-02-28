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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <a href="profile.php">Mi perfil</a>
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

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="http://placehold.it/900x350" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Visualizar</h1>
                <p>¿Tienes muchas preguntas y nadie de tu alrededor sabe la respuesta? </p>
                <p>Fastwer es tu solución! Haz click en Alta Pregunta y sube todas las dudas que tengas. </p>
                <p>Puedes optar por dos tipos de respuesta, la rápida es de (si o no) o la larga es que tu decides tres posibles respuestas</p>
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
                                            
            if($_POST['option']=='Per defecte'){

                $consulta_mysql="select id_question,title, question,views,date_create from question LIMIT 20";

            }
            else if($_POST['option']=='Temps'){

                $consulta_mysql="select id_question,title, question,views,date_create from question ORDER BY date_create DESC LIMIT 20";

            }
           
            }else{

                $consulta_mysql="select id_question,title, question,views,date_create from question LIMIT 20";
            }


                $resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);
        
                
                
                while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {

                 echo'
             

                    <div class="col-xs-6">
                    <h2>'. $row['title'] .'</h2><p>' .$row['question'] . '

                    <a class="btn btn-default" href="#"">Responder pregunta...</a></p>
                    </div> 
                    ';
                }
                $con->close;
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



