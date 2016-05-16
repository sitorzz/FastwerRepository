<?php session_start(); ?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FastWer, tu aplicación de preguntas y respuestas</title>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/small-business.css" rel="stylesheet">
    
    

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- En este página puedes registrarte a la plataforma web o loggearte con tu usuario -->

<body>    
    
    <?php
    
        include "navIndex.php";
    
    ?>
    
    <div class="container">

        <h1 class="text-center">FastWer</h1>


    <div id="myCarousel" class="carousel slide footer" data-ride="carousel">
  <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>

      </ol>
        

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/carousel/principal.png" alt="Fastwer">
        </div>

        <div class="item">
          <img src="images/carousel/principal2.png" alt="Chania">
        </div>

        <div class="item">
          <img src="images/carousel/principal3.png" alt="Flower">
        </div>

      </div>
            <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
            

  
    <div class="col-xs-12 col-md-4" style="float:none;">
      <h3>Crea tu pregunta</h3>

      <p>Ante cualquier situación dudosa, accede rápidamente a nuestro portal y escribe tu pregunta.</p>
    </div>
    <div class="col-xs-12 col-md-4" style="float:none;">
      <h3>Escoge tus respuestas</h3>
      <p>Te ofrecemos 2 tipos de respuesta, la más rápida de si/no y la posibilidad de escribir tu mismo hasta 4.</p>

    </div>
    <div class="col-xs-12 col-md-4" style="float:none;">
      <h3>Publícalas</h3>
      <p>Publícalas tanto para tus seguidores como para el mundo entero y quédate mucho más tranquilo.</p>
    </div>
        
    
    
<div class="container col-md-12">
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Login</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
                
                <form role="form" name="login" action="php/login.php" method="post">

                <div class="form-group">
                <label for="username">Nombre de usuario o email</label>
                <input type="text" class="form-control" id="username2" name="username2" placeholder="Nombre de usuario" required>
                </div>

                <div class="form-group">
                <label for="password">Contrase&ntilde;a</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Contrase&ntilde;a" required>
                </div>

                <button type="submit" class="btn btn-default" name="login">Acceder</button>
                </form>
            </div>
        </div>
    </div>


    <div class="panel panel-default">

        <div class="panel-heading">
            <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Registro</a>
            </h4>
        </div>

        <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
                <form role="form" name="registro" action="php/registro.php" method="post">	
                    
                <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" PATTERN = "[a-zA-Z0-9_-]{3,15}$" title="Debe contener de 3 a 15 caracteres sin signos de puntuación, ni caracteres especiales" required>
                </div>

                <div class="form-group">
                <label for="email">Correo Electronico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>

                <div class="form-group">
                <label for="password">Contrase&ntilde;a</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Debe contener una mayúscula, una minuscula, un número y más de 5 caracteres por su seguridad" required>
                </div>

                <div class="form-group">
                <label for="confirm_password">Confirmar Contrase&ntilde;a</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Debe contener una mayúscula, una minuscula, un número y más de 5 caracteres por su seguridad" placeholder="Confirmar Contrase&ntilde;a" required>
                </div>

                <button type="submit" class="btn btn-default" name="registro">Registrar</button>
                </form>
            </div>
        </div> 

    </div>
</div>
    
    </div>

        


    <footer id="footer">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </footer><!--/#footer-->
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
        
</body>
</html>

