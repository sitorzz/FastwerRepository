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
    <link href="css/soporte.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

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
                    CONTACTO CON EL SOPORTE
                </div>
            </div>  
            
            <div class="col-xs-12">   
                <p>Contáctenos para que podamos resolver cualquier duda o problema con nuestro servicio, le contestaremos a la mayor brevedad posible. <br>Envíenos todo tipo de sugerencias para que podamos mejorar nuestra plataforma. Reporte usuarios, preguntas y cualquier problema que tenga con nuestra plataforma o cualquier usuario de ella en sus diferentes dispositivos.</p>
            </div>
        </div>   
        
        
        
    <div class="">
        
        <form name="frmContacto" method="post" action="php/mailsoporte.php">
        <!--<form name="frmContacto" method="post" action="php/mailSoporte.php">-->

        <div class="form-group">
        <label for="first_name" class="soporte">Nombre: </label>
        <input class="form-control" type="text" name="first_name" maxlength="50" size="25" required>
        </div>
            
        <div class="form-group">
        <label for="email" class="soporte">E-mail: </label>
        <input class="form-control" type="text" name="email" maxlength="80" size="35" required>
        </div>
            
        <div class="form-group">
        <label for="comments" class="soporte">Comentarios: </label>
        <textarea class="form-control" name="comments" maxlength="500" cols="70" rows="5" required></textarea>
        </div>

        <input class="btn btn-primary btn-lg" type="submit" value="Enviar">
        </form>
        
    </div>    


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