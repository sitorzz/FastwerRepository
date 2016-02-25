<?php

			include "conexion.php";

			$user_id = 0;
			$id;
			$username;
			$query= "select * from user where (username='".$_POST['username2']."' or email='".$_POST['username2']."') and password='".$_POST['password2']."'";

			$result = $con->query($query);

			$username = $_POST["username2"];
			echo $username;

			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {
					echo "bucleaso";
					$user_id = 0;

					$id = $row["id"];
					echo "bucleaso".$id.$user_id;
					break;

				}
			}

			/*if ( $user_id !=  0 ){

				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";

			}else{*/

				$_SESSION["user_id"]= $id;

				session_start();

				print "<script>window.location='../index.php';</script>";

				//	}

			$con->close();

?>