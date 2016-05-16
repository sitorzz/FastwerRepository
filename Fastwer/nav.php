
<!-- La Nav que esta en todas las pantallas -->
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
                <a class="navbar-brand img_loog" class="logo_fastwer" href="#">
                    <img src="images/logo.png" alt="">
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
                        <a href="soporte.php">Soporte</a>
                    </li>
                    <li>
                        <a href="profile.php">Mi perfil</a>
                    </li>
                    <li>
                        <a href="misNotificaciones.php">Mis notificaciones</a>
                    </li>
                    
<?php

    $name= "";

    include 'php/conexion.php';

    //select del nombre y imagen del usuario logeado
    $result = mysqli_query($con,"SELECT u.username,u.user_avatar FROM user u WHERE u.id = $id_session");
     if (!$result) {
     die("Database query failed: " . mysqli_error());
     }
     //recorres el resultado
     while ($row = mysqli_fetch_array($result)) {

        $name = $row[0];
         
     }
                    
     echo ' <li>
                <a href="profile.php"><u>'.$name.'</u></a>
            </li>';

     $con->close();
                    
?> 
                    
                    <li>
                        <a href="php/logout.php">Cerrar sesión</a>
                    </li>
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>