<?php

			include "conexion.php";
            //si seleccionen una opcion
            if(isset($_POST['option'])){
                 //si han seleccionado la opcion por defecto (se hace un select normal)                           
            if($_POST['option']=='Per defecte'){

                $consulta_mysql="select id_question,title, question,views,date_create from question";

            }
            else if($_POST['option']=='Temps'){
                    //si seleccionan por tiempo se hace un select el cual ordenas los resultados por la fecha de creacion (datetime)
                $consulta_mysql="select id_question,title, question,views,date_create from question ORDER BY date_create DESC";

            }

           
            }else{
                //por defecto la opcion es un select normal
                $consulta_mysql="select id_question,title, question,views,date_create from question";
            }

                //haces la consulta y lo guarda en una variable que luego la recorres con el while y vas imprimiendo 
                // para cada resultado haces un nuevo div con los datos del select
                $resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);
        
       			print "<script>window.location='../home.php';</script>";
       			
                while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {

                 echo'<div class="row">
             

                    <div class="col-xs-12">
                      <h2>'. $row['title'] .'</h2>' .$row['question'] . '

                    <a class="btn btn-default" href="#"">Responder pregunta...</a>
                    </div> </div>';
                }
                //cierras la conexión
                $con->close();

                ?>