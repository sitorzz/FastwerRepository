<?php

			include "conexion.php";
            
            $user_id = 0;
			$id;
			$username;
			
            $user = $_POST['username2'];
            $pw = sha1(md5($_POST['password2']));

            $stmt = $con->prepare('select * from user where (username= ? or email= ?) and password= ?');
            $stmt->bind_param('sss',$user,$user,$pw);
            $stmt->execute();

            $result = $stmt->get_result();

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$user_id = 1;
					$id = $row["id"];
					//echo "bucleaso".$id.$user_id;
					break;
				}
			}

			//si el select no ha tenido ningun "row" significa que no hay ningun username con ese pw
            if ( $user_id==0 ){

				print "<script>alert(\"Acceso no permitido login erroneo.\");window.location='../index.php';</script>";

			}
			//si el select ha tenido algun "row" significa que ha coincidido algun username con la pw
           if( $user_id==1 ){
               
                $activado;
               
                $queryId= mysqli_query($con,"select activado from user where username='".$_POST['username2']."'");
                 
                while ($row2 = mysqli_fetch_array($queryId)) {

                    //echo $row2[0];
                    $activado = $row2[0];                    

                }
               //compruebas que la cuenta de usuario que ha introducida este activada (valor 1)
               if($activado == 1 ){                   
                   
                    session_start();

                    $_SESSION["id"]= $id;				
                    //si es asi haces sesion start y le das valor a la id y redirecionas la pagina a la home
                    print "<script>window.location='../home.php';</script>";
                   
               } else {
                   
                   print "<script>alert(\"Necesita activar la cuenta.\");window.location='../index.php';</script>";
                   
               }

           }
					
           	//cierras la conexión
			$con->close();

?>