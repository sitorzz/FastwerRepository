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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/friends.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">

</head>

<!-- Este es el apartado del usuario loggeado donde puedes cambiar tu imagen (de usuario) y puedes cambiar tu password -->

<body>

    <?php
    
        include "nav.php";
    
    ?>

  <!-- Wrapper for slides -->
  
  
  
     <div class="container rowFriend text-center col-xs-12">
        <?php

        include 'php/conexion.php';
        
        //select del nombre y imagen del usuario logeado
        $result = mysqli_query($con,"SELECT u.username,u.user_avatar FROM user u WHERE u.id = $id_session");
         if (!$result) {
         die("Database query failed: " . mysqli_error());
         }
         //recorres el resultado
         while ($row = mysqli_fetch_array($result)) {
             
         echo ' 
                <h3>'.$row[0].'</h3>
                <img class = "img-circle" src="'.$row[1].'" style="width:300px;height:250px;/>
          ';
         }
      
         $con->close();
      ?> 
              
       
              </div>
    
    <div class="container jumbotron text-center col-sm-6">
        
            <form action="php/update_password.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="password">Contrase&ntilde;a</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Debe contener una mayúscula, una minuscula, un número y más de 5 caracteres por su seguridad" required>
                </div>

            <div class="form-group">
            <label for="confirm_password">Confirmar Contrase&ntilde;a</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Debe contener una mayúscula, una minuscula, un número y más de 5 caracteres por su seguridad" placeholder="Confirmar Contrase&ntilde;a" required>
                </div>
        
            <button type="submit" class="btn btn-default" name="update">Cambiar Password</button>

                        
            </form>
        
            <form action="php/upload.php" method="post" enctype="multipart/form-data">
            <p>Select image to upload:</p>
            <input type="file" name="fileToUpload" id="fileToUpload"/>
          
            <input type="submit" value="Upload Image" name="submit"/>

         </form>
        
    </div>               
          
     <!--

       <---?php

            include "php/conexion.php";


                $consulta_mysql="select q.title,q.question from question q where fk_user = $id_session";

                $result = $con->query($consulta_mysql);
                
                while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
               
                 echo'
                    <div class="col-xs-6 col-md-12">
                    <p>hola</p>
                    <h2>'.$row['title'] .'</h2><p>' .$row['question'] .'

                    <a class="btn btn-default" href="#">Visualizar pregunta...</a></p>
                    </div> 
                    ';
                }
                $con->close;
         ?>
        -->
    <footer id="footer">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </footer><!--/#footer-->

</body>
</html>

