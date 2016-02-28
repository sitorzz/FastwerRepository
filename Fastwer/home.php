<?php 
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION["id"]=$id;
/*session created*/
echo $_SESSION["id"];
/*session was getting*/
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                        <a href="#">Visualizar</a>
                    </li>
                    <li>
                        <a href="#">Nueva Pregunta</a>
                    </li>
                    <li>
                        <a href="myFriends.php">Seguidos</a>
                    </li>
                    <li>
                        <a href="#">Soporte</a>
                    </li>
                    <li>
                        <a href="profile.php">Mi perfil</a>
                    </li>
                <li>
                <a href="php/logout.php">Cerrar Sesión</a>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            <a class="btn btn-primary btn-lg" href="#">Alta pregunta!</a>
        </div>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Well -->
    <div class="row">
        <div class="col-lg-12">
            <div class="well text-center">
                Texto infromativo o algo relebante
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-xs-12">
            <h2>Pregunta 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
            <p>Autor: Pepe   Respuestas: 5</p>
            <a class="btn btn-default" href="#">Más información...</a>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-xs-12">
            <h2>Pregunta 2</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
            <a class="btn btn-default" href="#">Más información...</a>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-xs-12">
            <h2>Pregunta 3</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
            <a class="btn btn-default" href="#">Más información...</a>
        </div>
        <!-- /.col-md-4 -->
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


