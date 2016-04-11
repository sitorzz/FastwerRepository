<?php
include "session.php";
include "conexion.php";
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["fileToUpload"])){
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "</br>File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "</br>Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "</br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "</br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $auxImg="images/".basename($_FILES["fileToUpload"]["name"]);

        

        $con->close;
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "</br>Sorry, there was an error uploading your file.";
    }
}
}



                if(isset($_POST["titulPreg"])){

                $tituloPregun = $_POST["titulPreg"];
                $textoPregun = $_POST["textoPreg"];
                $respuesta1 = $_POST["Resp1"];
                $respuesta2 = $_POST["Resp2"];
                $respuesta3 = $_POST["Resp3"];

                if(isset($_POST["respuestaSimpl"])){

                    $insertRespSimp="insert into question(title,question,votes,image_question,date_create,fk_user,is_simple, views) values('$tituloPregun','$textoPregun',0,'$auxImg', NOW(),'".$id_session."' ,'s',0)";

                    
                    
                    if ($con->query($insertRespSimp) === TRUE) {

                        $selectPk2="select id_question from question where question='$textoPregun'";
                        $resultado_consulta_mysql2 = mysqli_query($con, $selectPk2);

                        while ($row1 = mysqli_fetch_array($resultado_consulta_mysql2)) {

                        $insertRespost="insert into answer(fk_question,answer) values ('$row1[0]','Si')";
                        $insertRespost2="insert into answer(fk_question,answer) values ('$row1[0]','No')";
                        $con->query($insertRespost);
                        $con->query($insertRespost2);

                        }

                        
                            echo "<script type='text/javascript'>document.getElementById('respCorrecta').style.display = 'inline';</script>";

                    } else {
                        
                       

                       

                                echo "<script type='text/javascript'>document.getElementById('respIncorrecta').style.display = 'inline';</script>";
                    }


                }else{

                        $insertRespComp="insert into question(title,question,votes,image_question,date_create,fk_user,is_simple, views) values('$tituloPregun','$textoPregun',0,'$auxImg', NOW(),'".$id_session."' ,'n',0)";

                        if ($con->query($insertRespComp) === TRUE) {

                        $selectPk="select id_question from question where question='$textoPregun'";
                        $resultado_consulta_mysql = mysqli_query($con, $selectPk);

                        while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
                        
                        $insertRespost="insert into answer(fk_question,answer) values ('$row[0]','$respuesta1')";
                        $insertRespost2="insert into answer(fk_question,answer) values ('$row[0]','$respuesta2')";
                        $insertRespost3="insert into answer(fk_question,answer) values ('$row[0]','$respuesta3')";
                        $con->query($insertRespost);
                        $con->query($insertRespost2);
                        $con->query($insertRespost3);
                        }
                        echo "<script type='text/javascript'>document.getElementById('respCorrecta').style.display = 'inline';</script>";
                }else{
                    echo "<script type='text/javascript'>document.getElementById('respIncorrecta').style.display = 'inline';</script>";
                }
            }
        }

        $con->close();


echo "
<script>window.location='../add_question.php';</script>";

?>