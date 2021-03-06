<?php
include "session.php";
include "conexion.php";
$target_dir = "../images/";
$aux = '';
@$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "</br>File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if (@$_FILES["fileToUpload"]["size"] > 2000000) {
    //echo "</br>Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "</br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "</br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
        
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

     $aux="images/".basename($_FILES["fileToUpload"]["name"]); 
        
        //echo $aux;        
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    } else {
        //echo "</br>Sorry, there was an error uploading your file.";
    }
    
}

//check si han escrito algo en el input de titulo de pregunta
if(isset($_POST["titulPreg"])){
    $id_pregunta = $_GET['id_pregunta']; 
    $tituloPregun = $_POST["titulPreg"];
    $textoPregun = $_POST["textoPreg"];
    $respuesta1 = $_POST["Resp1"];
    $respuesta2 = $_POST["Resp2"];
    $respuesta3 = $_POST["Resp3"];
    
    //check si han clcikado el checkbox de prgunta simple
    if(isset($_POST["respuestaSimpl"])){
        //si lo han seleccionado se hace el update de esa pregunta (en la tabla question)
        if($aux == null){
             $updateRespSimp="update question set title='$tituloPregun', question='$textoPregun', is_simple='s' WHERE id_question=".$id_pregunta."";
        }else{
            $updateRespSimp="update question set title='$tituloPregun', question='$textoPregun', image_question='".$aux."', is_simple='s' WHERE id_question=".$id_pregunta."";
        }
        $restUpdate = mysqli_query($con, $updateRespSimp);

        if ($restUpdate) {
            
            //si el insert de la tabla question se hace correctamente se hace el insert de las dos respuestas (si o no)
            //hago un select de la id de la pregunta añadida anteriormente para decir que las repuestas a añadir son de esa
            //pregunta
            $selectAns="select answer from answer where fk_question=".$id_pregunta." ";
            $result11 = mysqli_query($con, $selectAns);

            while ($row1 = mysqli_fetch_array($result11)) {

                if($row1 == 'Si' || $row1 == 'No'){

                }else{
                    $delteQuerySim = "delete from answer where fk_question= ".$id_pregunta." ";
                    $con->query($delteQuerySim);
                    $insertRespost="insert into answer(fk_question,answer) values (".$id_pregunta.",'Si')";
                    $insertRespost2="insert into answer(fk_question,answer) values (".$id_pregunta.",'No')";
                    $con->query($insertRespost);
                    $con->query($insertRespost2);
                    break;
                }
            

            }
            // esta variable dice que se ha echo el insert de la pregunta correctamente (luego en el otro php depende si es 1 o 0 hara echo de un texto o otro)
            $variablePasar = '1';
             print "<script>alert(\"Update correcto!!\");window.location='../home.php';</script>";

        } else {
            
            // esta variable dice que se ha echo el insert de la pregunta incorrectamente
            $variablePasar = '0';
             print "<script>alert(\"Update incorrecto!!\");window.location='../home.php';</script>";
        }


    
    } else if($respuesta1 != "") {

        //si no han seleccionado el checkbox y han rellenado el primer input almenos se hace el insert de esa pregunta (en la tabla question)

        if($aux == null){
             $updateRespComp="update question set title='$tituloPregun', question='$textoPregun', is_simple='n' WHERE id_question=".$id_pregunta."";
        }else{
            $updateRespComp="update question set title='$tituloPregun', question='$textoPregun', image_question='".$aux."', is_simple='n' WHERE id_question=".$id_pregunta."";
        }
        $restUpdate2 = mysqli_query($con, $updateRespComp);

        if ($restUpdate2) {
            
            

            $selectAns="select answer from answer where fk_question=".$id_pregunta." ";
            $result11 = mysqli_query($con, $selectAns);

            while ($row1 = mysqli_fetch_array($result11)) {

                
                    $delteQuerySim = "delete from answer where fk_question= ".$id_pregunta." ";
                    $con->query($delteQuerySim);
                    
                    if($respuesta1 != ""){
                    $insertRespost="insert into answer(fk_question,answer) values (".$id_pregunta.",'$respuesta1')";
                    }
                    //compruebas que han escrito algo en el input2
                    if($respuesta2 != ""){
                        $insertRespost2="insert into answer(fk_question,answer) values (".$id_pregunta.",'$respuesta2')";
                    }
                    //compruebas que han escrito algo en el input3
                    if($respuesta3 != ""){
                        $insertRespost3="insert into answer(fk_question,answer) values (".$id_pregunta.",'$respuesta3')";
                    }

                    $con->query($insertRespost);
                    @$con->query($insertRespost2);
                    @$con->query($insertRespost3);
                    break;
                
            

            }
            
            // esta variable dice que se ha echo el insert de la pregunta correctamente
            $variablePasar = 1;
            print "<script>alert(\"Update correcto!!\");window.location='../home.php';</script>";

        }else{
            
            // esta variable dice que se ha echo el insert de la pregunta incorrectamente
            $variablePasar=0;
            print "<script>alert(\"Update incorrecto!!\");window.location='../home.php';</script>";
            
        }
        
    }else{
        
        // esta variable dice que se ha echo el insert de la pregunta incorrectamente
        $variablePasar=0;
        print "<script>alert(\"Update incorrecto!!\");window.location='../home.php';</script>";
        
    }
    
 }     
    




//cierras la conexión
$con->close();



?>