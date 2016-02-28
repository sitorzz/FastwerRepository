<?php

include "conexion.php";
			
if($_POST["password"]==$_POST["confirm_password"]){
			$found = 0;

		$query= "select * from user where username='".$_POST['username']."' or email='".$_POST['email']."'";

			$result = $con->query($query);

    echo $_POST["username"];
    echo $_POST["password"];
    echo $_POST["email"];
			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {


					$found = 1;

					$id = $row["id"];
                    
					echo "bucleaso".$id.$user_id;
					break;

				}
			}

			if($found==1){
                
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../index.php';</script>";
			}

            if($found==0) {
                
            $sql = "insert into user (id,username,password,email,user_avatar,user_state,user_first_log) value (NULL,'".$_POST['username']."','".$_POST['password']."','".$_POST['email']."',NULL,NULL, NOW())";
                
            $query1 = $con->query($sql);
                
             if ($query1 != null) {
            print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../index.php';</script>";

             }
				else{

					echo "Problema al registrarse";
				}
            }

			$con->close();
}
else {
    
     print "<script>alert(\"Las password no coinciden, vuelva a intentarlo\");window.location='../index.php';</script>";
}
?>
