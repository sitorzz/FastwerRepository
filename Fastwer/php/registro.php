<?php

include "conexion.php";

ini_set("sendmail_from","algibealgibe@gmail.com");


			
if($_POST["password"]==$_POST["confirm_password"]){
			$found = 0;

        //haces un select del usuario con el username y pw que ha introducido el usuario por los inputs $POST
		$query= "select * from user where username='".$_POST['username']."' or email='".$_POST['email']."'";

			$result = $con->query($query);

    echo $_POST["username"];
    echo $_POST["password"];
    echo $_POST["email"];
    
			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {


					$found = 1;

					$id = $row["id"];
                    
					break;

				}
			}
            // si $found==1 significa que ya hay algun usuario con ese username y pw
			if($found==1){
                
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../index.php';</script>";
			}
            // si found es 0 significa que no ha habido ningun coincidencia y no hay ningun user creado anteriormente con esos datos
            if($found==0) {
                
            //haces el insert del user en la bbdd
            $sql = "insert into user (id,username,password,email,user_avatar,user_state,user_first_log,activado) value (NULL,'".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','images/foto_perfil.jpg',NULL, NOW(),0)";
                
            $query1 = $con->query($sql);
                
             if ($query1 != null) {
                 
            $id_usuario = 0;
                
            $queryId= mysqli_query($con,"select id from user where username='".$_POST['username']."'");
                 
            while ($row2 = mysqli_fetch_array($queryId)) {

                //echo $row2[0];
                $id_usuario = $row2[0];
                echo '<br> Id usuario'.$id_usuario.'<br>';
                
            }
                 
                 
            //para el envío en formato HTML 
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            //dirección del remitente 
            $headers .= "From: Equipo de fastwer <fastwer.com>\r\n"; // Primer titulo correo
                 
            $cuerpo = ' 
                        <html> 
                        <head> 
                        <title>Prueba de correo</title> 
                        </head> 
                        <body> 
                        <h1>Mail para activar la cuenta de fastwer</h1> 

                        <br>
                        <a href="http://localhost/FastwerRepository/Fastwer/php/activarcuenta.php?idActivar='.$id_usuario.'">Para activar tu cuenta haz click en este enlace</a>

                        </body> 
                        </html>'; 
                 

            $email_subject = "Contacto desde el sitio web";
                 
            //$email_to = "barrichello@hotmail.es";
            $email_to = $_POST["email"];

                 
            mail($email_to, $email_subject, $cuerpo, $headers);
                 
            echo "<br>¡El formulario se ha enviado con éxito!";

            print "<script>alert(\"Registro exitoso. Le hemos enviado un mail a su correo para la activacion de su cuenta\");window.location='../index.php';</script>";
            //print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../index.php';</script>";

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
