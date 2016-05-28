<?php 
include "php/session.php";
include "php/add_question2.php";
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

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
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
        <?php
          include 'php/conexion.php'; 

          // Recibes la variable del otro php (add_question2.php) y depende si se ha echo el insert correcto o no sera (0 o 1)
          if(@$variablePasar == '1'){
           echo ' <div class="col-xs-12" id="respCorrectaa">
                <p>Pregunta añadida correctamente</p>
            </div>';
          }else if(@$variablePasar == '0'){
            echo '<div class="col-xs-12" id="respIncorrectaa">
                <p>No ha sido possible añadir la pregunta, intentelo de nuevo porfavor.</p>
            </div>';
          }

          $id_pregunta = $_GET['id_pregunta']; 

            if($id_pregunta != 0){
            $resultSelect2 = mysqli_query($con,"select q.title, q.question, q.image_question, q.is_simple FROM question q WHERE fk_user = ".$id_session." and id_question = ".$id_pregunta." ");
            while ($row5 = mysqli_fetch_array($resultSelect2)) {

            $titulo1 = $row5['title'];
            $imagen1 = $row5['image_question'];
            $texto1 = $row5['question'];
            
            
          
            if($row5['is_simple'] == 's'){
              $resp_s = 1;

            }else{
              $resultAnsw = mysqli_query($con,"select a.* from answer a, question q WHERE q.id_question = a.fk_question and q.id_question=".$id_pregunta." ");
              $contador = 0;
              while ($row2 = mysqli_fetch_array($resultAnsw)) {
                if($contador == 0){
                  $resp_1 = $row2[2];
                 }else if($contador == 1){
                  $resp_2 = $row2[2];
                }else if($contador == 2){
                  $resp_3 = $row2[2];
                }
                $contador++;
              }
            }
          }
          

          }

            ?>
            <div class="col-xs-12" id="imgSo">
                <img class="img-responsive img-rounded" src="images/add_quest.jpg"  alt="">
            </div>
            <!-- /.col-md-8 -->
            <?php
            if($id_pregunta != 0){
              echo"
            <div class='col-xs-12'>
                <h1>Update pregunta</h1>
                <p>En este apartado puedes subir una nueva pregunta</p>
            </div>";

            }else{
            echo"
            <div class='col-xs-12'>
                <h1>Alta pregunta</h1>
                <p>En este apartado puedes subir una nueva pregunta</p>
            </div>";
          }
            ?>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
           
           <!-- Formulario para añadir nuevas preguntas -->
           <form method="POST" action="php/add_question2.php" enctype="multipart/form-data" id="uno">

              <div class="form-group col-xs-12">
                <label>* Titulo pregunta:</label>
                <input type="text" class="form-control" placeholder="Texto pregunta" name="titulPreg" value="<?php echo $titulo1; ?>" required />
              </div>

              <div class="form-group col-md-6">
                <label>Imagen (Url):</label>
                <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $imagen1; ?>"/>
              </div>

              <div class="form-group col-xs-12">
                <label>* Texto:</label>
                <input type="text" class="form-control" placeholder="Texto pregunta" name=textoPreg value="<?php echo $texto1; ?>" required/>
              </div>

              <br>

              <div class="form-group col-xs-12">
              <h2>Elige el tipo de respuesta a tu pregunta:</h2>
              </div>

              <div class="form-group col-xs-12">
                <label>Tipo de respuesta: Si o No?</label>
                <input type="checkbox" name="respuestaSimpl" id="respuestaSimpl" <?php echo ($resp_s==1 ? 'checked' : '');?> >
              </div>

              <div class="form-group col-xs-12">
              <p><i>(En caso de no ser Si o No el tipo de respuesta que quieres, rellena los campos con las possibles respuestas)</i></p>
              </div>

            
              <div class="form-group col-md-4">
                <label>Respuesta 1:</label>
                <input type="textarea" class="form-control" placeholder="Escribe tu opcion 1" name="Resp1" id="Resp1" value="<?php echo $resp_1; ?>">
              </div>
              <div class="form-group col-md-4">
                <label>Respuesta 2:</label>
                <input type="textarea" class="form-control" placeholder="Escribe tu opcion 2" name="Resp2" value="<?php echo $resp_2; ?>">
              </div>
              <div class="form-group col-md-4">
                <label>Respuesta 3:</label>
                <input type="textarea" class="form-control" placeholder="Escribe tu opcion 3" name="Resp3" value="<?php echo $resp_3; ?>">
              </div>

              <div class="form-group col-xs-12">
                 <input class="btn btn-primary btn-lg" type="submit" class="btn btn-default" name="submit"/>
              </div>

          </form>  

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