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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/friends.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">

</head>

<body>

    <?php
    
        include "nav.php";
    
    ?>

  <!-- Wrapper for slides -->
  
  
     <div class="container">
         
         <div class=" rowFriend text-center col-xs-12">
             
            <?php

            include 'php/conexion.php';


            $result = mysqli_query($con,"SELECT u.username,u.user_avatar FROM user u WHERE u.id = $id_session");
             if (!$result) {
             die("Database query failed: " . mysqli_error());
             }

             while ($row = mysqli_fetch_array($result)) {

             echo ' 
                    <h3>'.$row[0].'</h3>
                    <img class = "img-circle" src="'.$row[1].'" style="width:300px;height:250px;/>
              ';
             }

             $con->close();
          ?> 

        </div>

        <div>
            <form action="php/upload.php" method="post" enctype="multipart/form-data">
            <p>Select image to upload:</p>
            <input type="file" name="fileToUpload" id="fileToUpload"/>
            <input type="submit" value="Upload Image" name="submit"/>
            </form>
        </div> 
        
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

