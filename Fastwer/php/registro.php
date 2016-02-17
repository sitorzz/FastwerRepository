<?php

include "conexion.php";
			
			$found=0;
			$sql1= "select * from user where username=\"$_POST[username]\" or email=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while ($row=$query->fetch_array()) {
				$found=1;
				break;
			}
			if($found==1){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
			}
            else {
            $sql = "insert into user (id,username,password,email,user_avatar,user_state,user_first_log) value (NULL,\"$_POST[username]\",\"$_POST[password]\",\"$_POST[email]\",NULL,NULL,NOW())";
            $query = $con->query($sql);
             if ($query != null) {
            print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../login.html';</script>";

             }
            }



?>