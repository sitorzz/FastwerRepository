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
    <link href="css/friends.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- Este apartado se basa en un buscador de amigos que si se encuentra alguno puedes agregarlo (hay un boton de añadir amigo disponible)-->

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
                    BUSCAR AMIGOS
                </div>
            </div>            
        </div>   
        
        
        
        
        
            
    
        <!-- Buscar Amigos PHP -->
            
       <?php

        
        $friends = $_POST['nameFriend'];        
     
        include 'php/conexion.php';
       
        $result = mysqli_query($con,"SELECT u.username, u.user_avatar, u.id FROM user u WHERE u.username LIKE '%".$friends."%' AND u.id !='".$id_session."' AND u.id NOT IN (SELECT id_friend from friends where id_user = ".$id_session.") ORDER BY u.username");
         if (!$result) {
         die("Database query failed: " . mysqli_error());
         }
                  
         while ($row = mysqli_fetch_array($result)) {
             
         echo '<div class="row rowFriend">
                <div class="col-xs-12" >
                    <div class="imageContainer">
                        <img src="'.$row[1].'">
                    </div>  
                    <h class="nameFriend" >'.$row[0].'</h>
                    <a class="btn btn-primary btn-lg addFriend" href="php/addFriend.php?name='.$row[2].'">Añadir amigos</a>
                </div>
            </div>';
         }
         
      ?>       
        
     
        


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