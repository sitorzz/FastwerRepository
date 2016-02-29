<?php

<<<<<<< HEAD
			include "conexion.php";            
=======
			include "conexion.php";
            

>>>>>>> refs/remotes/origin/master

			$user_id = 0;
			$id;
			$username;
			$query= "select * from user where (username='".$_POST['username2']."' or email='".$_POST['username2']."') and password='".$_POST['password2']."'";

			$result = $con->query($query);

			/*$username = $_POST['username2'];
			var_dump($username);
            */

			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {


					$user_id = 1;

					$id = $row["id"];
					echo "bucleaso".$id.$user_id;
					break;

				}
			}

            if ( $user_id==0 ){

				print "<script>alert(\"Acceso no permitido login erroneo.\");window.location='../index.php';</script>";

			}

           if( $user_id==1 ){

            echo $user_id;

                session_start();
			
				$_SESSION["id"]= $id;				

				print "<script>window.location='../home.php';</script>";
           }
					

			$con->close();

?>