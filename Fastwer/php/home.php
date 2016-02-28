<?php

			include "conexion.php";

            if(isset($_POST['option'])){
                                            
            if($_POST['option']=='Per defecte'){

                $consulta_mysql="select id_question,title, question,views,date_create from question";

            }
            else if($_POST['option']=='Temps'){

                $consulta_mysql="select id_question,title, question,views,date_create from question ORDER BY date_create DESC";

            }else if($_POST['option']=='A-Z'){

                $consulta_mysql="select id_question,title, question,views,date_create,fk_user from question ORDER BY fk_user ASC";
            }

           
            }else{

                $consulta_mysql="select id_question,title, question,views,date_create from question";
            }


                $resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);
        
       			print "<script>window.location='../home.php';</script>";
       			
                while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {

                 echo'<div class="row">
             

                    <div class="col-xs-12">
                      <h2>'. $row['title'] .'</h2>' .$row['question'] . '

                    <a class="btn btn-default" href="#"">Responder pregunta...</a>
                    </div> </div>';
                }


                $con->close();

                ?>