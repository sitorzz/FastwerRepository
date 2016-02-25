<?php

include "conexion.php";
			
			$found=0;
			$sql1= "select * from user where username='".$_POST['username']."' or email='".$_POST['email']."'";

			$query = $con->query($sql1);

			while ($row=$query->fetch_array()) {
				$found=1;
				echo "entró";
				break;
			}

			if($found==1){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../login.php';</script>";
			}
            else {
            $sql = "insert into user (id,username,password,email,user_avatar,user_state,user_first_log) value (NULL,'".$_POST['username']."','".$_POST['password']."','".$_POST['email']."',NULL,NULL, NOW())";
            $query1 = $con->query($sql);
             if ($query1 != null) {
            print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../login.php';</script>";

             }
				else{

					echo "Problema al registrarse";
				}
            }

			$con->close();

?>
