<?php
$connect  = mysqli_connect("localhost","root","root","fastwer_db") or die("Error " . mysqli_error($link));
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


        <!-- Call to Action Well -->
        <div class="row">
            
           <form method="POST">
              <div class="form-group col-md-6">
                <label>* Titulo pregunta</label>
                <input type="text" class="form-control" placeholder="Titulo pregunta" name="tituloPreg"/>
              </div>

              <div class="form-group col-xs-12">
                <label>* Texto:</label>
                <input type="text" class="form-control" placeholder="Texto pregunta" name="textoPreg" />
              </div>

              </br>





                <div class="form-group col-xs-12">
                 <input type="submit" class="btn btn-default"></input>
              </div>
              </form>


            <?php

                $tituloPregun = $_POST["tituloPreg"];
                
                $textoPregun = $_POST["textoPreg"];
                
                var_dump($tituloPregun);
                var_dump($textoPregun);

                if(isset($tituloPregun)){
                    
                }

            ?>
    

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>