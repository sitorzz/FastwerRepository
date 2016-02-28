<?php 
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$id=$_SESSION["id"];
/*session created*/
echo $_SESSION["id"];
/*session was getting*/
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FASTWER</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="http://placehold.it/150x50&text=Logo" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="home.php">Visualizar</a>
                    </li>
                    <li>
                        <a href="add_question.php">Nueva Pregunta</a>
                    </li>
                    <li>
                        <a href="myFriends.php">Amigos</a>
                    </li>
                    <li>
                        <a href="#">Soporte</a>
                    </li>
                    <li>
                        <a href="profile.php">Mi perfil</a>
                    </li>
                    <li>
                        <a href="php/logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-xs-12">
                <img class="img-responsive img-rounded" src="http://placehold.it/1250x150" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-xs-12">
                <h1>Alta pregunta</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
           
           <form method="POST">

              <div class="form-group col-xs-12">
                <label>* Titulo pregunta:</label>
                <input type="text" class="form-control" placeholder="Texto pregunta" name="titulPreg" required />
              </div>

              <div class="form-group col-md-6">
                <label>Imagen (Url):</label>
                <input type="text" class="form-control" placeholder="Formato jpg,png" name="imagenPreg"/>
              </div>

              <div class="form-group col-xs-12">
                <label>* Texto:</label>
                <input type="text" class="form-control" placeholder="Texto pregunta" name=textoPreg required/>
              </div>

              </br>

              <div class="form-group col-xs-2">
              	<label>Tipo simple: (Si/No)  </label>
                <input type="checkbox" name="respuestaSimpl">
              </div>
              <div class="form-group col-xs-10">
              <p>(En caso de no ser simple el tipo de respuesta que quieres, rellena los campos con las possibles respuestas)</p>
              </div>
              <div class="form-group col-md-4">
                <label>Respuesta 1:</label>
                <input type="textarea" class="form-control" placeholder="Respuesta 1" name="Resp1">
              </div>
              <div class="form-group col-md-4">
                <label>Respuesta 2:</label>
                <input type="textarea" class="form-control" placeholder="Respuesta 2" name="Resp2">
              </div>
              <div class="form-group col-md-4">
                <label>Respuesta 3:</label>
                <input type="textarea" class="form-control" placeholder="Respuesta 3" name="Resp3">
              </div>

              <div class="form-group col-xs-12">
                 <input type="submit" class="btn btn-default"></input>
              </div>


          </form>

           	<?php

                include "php/conexion.php";

           		if(isset($_POST["titulPreg"])){

        		$tituloPregun = $_POST["titulPreg"];
        		$imagenPregun = $_POST["imagenPreg"];
        		$textoPregun = $_POST["textoPreg"];
        		$respuesta1 = $_POST["Resp1"];
        		$respuesta2 = $_POST["Resp2"];
        		$respuesta3 = $_POST["Resp3"];

        		if(isset($_POST["respuestaSimpl"])){

        			$insertRespSimp="insert into question(title,question,votes,image_question,date_create,fk_user,is_simple, views) values('$tituloPregun','$textoPregun',0,'$imagenPregun', NOW(),1,'s',0)";

        			
        			
		            if ($connect->query($insertRespSimp) === TRUE) {

						$selectPk2="select id_question from question where question='$textoPregun'";
						$resultado_consulta_mysql2 = mysqli_query($connect, $selectPk2);

					    while ($row1 = mysqli_fetch_array($resultado_consulta_mysql2)) {

	        			$insertRespost="insert into answer(fk_question,answer) values ('$row1[0]','Si')";
	        			$insertRespost2="insert into answer(fk_question,answer) values ('$row1[0]','No')";
	        			$connect->query($insertRespost);
	        			$connect->query($insertRespost2);

	        			}

		                echo "<div class='col-xs-12'>
		                		<p>Insert correcto</p>
		                		</div>";

		            } else {
		                
		               

		                echo "<div class='col-xs-12'>
		                		<p>Insert incorrecto</p>
		                		</div>";
		            }


        		}else{

        				$insertRespComp="insert into question(title,question,votes,image_question,date_create,fk_user,is_simple, views) values('$tituloPregun','$textoPregun',0,'$imagenPregun', NOW(),1,'n',0)";

		                if ($connect->query($insertRespComp) === TRUE) {

						$selectPk="select id_question from question where question='$textoPregun'";
						$resultado_consulta_mysql = mysqli_query($connect, $selectPk);

					    while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
						
	        			$insertRespost="insert into answer(fk_question,answer) values ('$row[0]','$respuesta1')";
	        			$insertRespost2="insert into answer(fk_question,answer) values ('$row[0]','$respuesta2')";
	        			$insertRespost3="insert into answer(fk_question,answer) values ('$row[0]','$respuesta3')";
	        			$connect->query($insertRespost);
	        			$connect->query($insertRespost2);
	        			$connect->query($insertRespost3);
		                }

        		}
        	}
        }

        $con->close;
        	?>



        </div>
        <!-- /.row -->





        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; ProyectoM013 - FASTWER</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>