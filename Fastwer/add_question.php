<?php 
include "php/session.php";
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
    <link href="css/addquestion.css" rel="stylesheet">

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

        <!-- Heading Row -->
        <div class="row">
            <div class="col-xs-12" id="respCorrecta">
                <p>Pregunta añadida correctamente</p>
            </div>
            <div class="col-xs-12" id="respIncorrecta">
                <p>No ha sido possible añadir la pregunta, intentelo de nuevo porfavor.</p>
            </div>
            <div class="col-xs-12">
                <img class="img-responsive img-rounded" src="images/add_quest.jpg" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-xs-12">
                <h1>Alta pregunta</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
           
           <form method="POST" action="php/add_question.php" enctype="multipart/form-data">

              <div class="form-group col-xs-12">
                <label>* Titulo pregunta:</label>
                <input type="text" class="form-control" placeholder="Texto pregunta" name="titulPreg" required />
              </div>

              <div class="form-group col-md-6">
                <label>Imagen (Url):</label>
                <input type="file" name="fileToUpload" id="fileToUpload"/>
              </div>

              <div class="form-group col-xs-12">
                <label>* Texto:</label>
                <input type="text" class="form-control" placeholder="Texto pregunta" name=textoPreg required/>
              </div>

              <br>

              <div class="form-group col-xs-12">
              <h2>Elige el tipo de respuesta a tu pregunta:</h2>
              </div>

              <div class="form-group col-xs-12">
                <label>Tipo de respuesta: Si o No?</label>
                <input type="checkbox" name="respuestaSimpl">
              </div>

              <div class="form-group col-xs-12">
              <p><i>(En caso de no ser Si o No el tipo de respuesta que quieres, rellena los campos con las possibles respuestas)</i></p>
              </div>

            
              <div class="form-group col-md-4">
                <label>Respuesta 1:</label>
                <input type="textarea" class="form-control" placeholder="Escribe tu opcion 1" name="Resp1">
              </div>
              <div class="form-group col-md-4">
                <label>Respuesta 2:</label>
                <input type="textarea" class="form-control" placeholder="Escribe tu opcion 2" name="Resp2">
              </div>
              <div class="form-group col-md-4">
                <label>Respuesta 3:</label>
                <input type="textarea" class="form-control" placeholder="Escribe tu opcion 3" name="Resp3">
              </div>

              <div class="form-group col-xs-12">
                 <input class="btn btn-primary btn-lg" type="submit" class="btn btn-default" name="submit"/>
              </div>

          </form>  

        </div>
        <!-- /.row -->





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
    
    <!-- Ponerlo en un archivo diferente-->


</body>

</html>