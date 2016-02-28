<?php
include "php/session.php"
    ?>

<!DOCTYPE html>

<html lang="es">

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
  




  <!-- Wrapper for slides -->
  <div class="row">
      <div class="text-center">
        <?php

        include 'php/conexion.php';
        

        $result = mysqli_query($con,"SELECT u.username,u.user_avatar FROM user u WHERE u.id = $id_session");
         if (!$result) {
         die("Database query failed: " . mysqli_error());
         }
                  
         while ($row = mysqli_fetch_array($result)) {
             
         echo '<div class="row">
                <div class="col-xs-12" >
                <h3>'.$row[0].'</h3>
                
                    <div class="imageContainer">
                        <img src="'.$row[1].'" style="width:300px;height:250px;/>
                    </div>  
                    
                    
                </div>
            </div>';
         }
      
         $con->close();
      ?> 
          
</div>
      <div class="row">
        <?php

            include "php/conexion.php";


                $consulta_mysql="select * from question where fk_user = $id_session order by date_create LIMIT 20";

                $resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);
        
                
                
                while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {

                 echo'
             
                    
                    <div class="col-xs-6 col-md-12">
                    <p>hola</p>
                    <h2>'. $row['title'] .'</h2><p>' .$row['question'] . '

                    <a class="btn btn-default" href="#">Visualizar pregunta...</a></p>
                    </div> 
                    ';
                }
                $con->close;
         ?>
        </div>
    </div>
    <footer id="footer">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </footer><!--/#footer-->

</body>
</html>

