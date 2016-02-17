<?php



			include "conexion.php";
			
			$user_id=null;
			$query= "select * from user where (username=\"$_POST[username2]\" or email=\"$_POST[username2]\") and password=\"$_POST[password2]\" ";
			$result = $con->query($query);

			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo "hola";
                $user_id=$row["id"];
                break;
			}

			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../index.html';</script>";

}



?>